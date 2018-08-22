Ext.define('Ext.ux.desktop.Desktop', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.desktop',
    uses: [
        'Ext.util.MixedCollection',
        'Ext.menu.Menu',
        'Ext.view.View', // dataview
        'Ext.window.Window',
        'Ext.ux.desktop.TaskBar',
        'Ext.ux.desktop.Wallpaper',
        'Ext.ux.desktop.ShortcutModel'
    ],
    activeWindowCls: 'ux-desktop-active-win',
    inactiveWindowCls: 'ux-desktop-inactive-win',
    lastActiveWindow: null,
    border: false,
    html: '&#160;',
    layout: 'fit',
    xTickSize: 1,
    yTickSize: 1,
    shortcuts: null,            //桌面快捷方式Store
    shortcutItemSelector: 'div.ux-desktop-shortcut',
    menupnlItemSelector: 'div.ux-menupnl-shortcut',
    shortcutTpl: [
        '<tpl for=".">',
            '<div class="ux-desktop-shortcut" id="{name}-shortcut">',
                '<div class="ux-desktop-shortcut-icon {iconCls}">',
                    '<img src="', Ext.BLANK_IMAGE_URL, '" title="{name}">',
                '</div>',
                '<span class="ux-desktop-shortcut-text">{name}</span>',
            '</div>',
        '</tpl>',
        '<div class="x-clear"></div>'
    ],
    windowMenu: null,                                                   //任务栏右键菜单
    initComponent: function() {
        var me = this;
        me.bbar = me.taskbar = new Ext.ux.desktop.TaskBar();
        me.taskbar.startMenu.menu.on('mouseover', function(menu, item, e, eOpts) {
            if (item == null) return;
            me.showMenuChildItem(item.text);
        });
        me.taskbar.quickStart.add([{ name: 'Accordion Window', iconCls: 'accordion', handler: Ext.bind(me.tileWindows, me) },
                { name: 'Cascade Window', iconCls: 'icon-grid', handler: Ext.bind(me.cascadeWindows, me) },
                { name: 'Show Desktop', iconCls: 'showdesktop', handler: Ext.bind(me.showDesktop, me) }
                ]);

        me.windowMenu = Ext.create('Ext.menu.Menu', {
            defaultAlign: 'br-tr',
            items: [
                    { text: '还原', handler: me.onWindowMenuRestore, scope: me },
                    { text: '最小化', handler: me.onWindowMenuMinimize, scope: me },
                    { text: '最大化', handler: me.onWindowMenuMaximize, scope: me },
                    '-',
                    { text: 'Close', handler: me.onWindowMenuClose, scope: me }
                ],
            listeners: {
                beforeshow: me.onWindowMenuBeforeShow,
                hide: me.onWindowMenuHide,
                scope: me
            }
        });
        me.taskbar.windowMenu = me.windowMenu;
        me.windows = new Ext.util.MixedCollection();                    
        me.contextMenu = Ext.create('Ext.menu.Menu', {                  
            items: [
                    { text: '桌面设置', iconCls: 'showdesktop', handler: me.onSettings, scope: me },
                    '-',
                    { text: '平铺', iconCls: 'accordion', handler: me.tileWindows, scope: me, minWindows: 1 },
                    { text: '层叠', iconCls: 'icon-grid', handler: me.cascadeWindows, scope: me, minWindows: 1 }
                ]
        });
        me.shortcuts = Ext.create('Ext.data.Store', {                   
            model: 'Ext.ux.desktop.ShortcutModel',
            data: [
                    { name: 'Grid Window', iconCls: 'grid-shortcut', module: 'MyDesktop.GridWindow' },
                    { name: 'Accordion Window', iconCls: 'accordion-shortcut', module: 'MyDesktop.TabWindow' },
                    { name: 'Notepad', iconCls: 'notepad-shortcut', module: 'MyDesktop.GridWindow' },
                    { name: 'System Status', iconCls: 'cpu-shortcut', module: 'MyDesktop.TabWindow' }
                ]
        })


        me.menus = Ext.create('Ext.data.Store', {                   
            model: 'Ext.ux.desktop.MenuModel',
            data: [
                    { name: 'Grid Window', iconCls: 'grid-shortcut', getChildMenu: [{ name: '表格表格', iconCls: 'accordion-shortcut', module: 'MyDesktop.TabWindow' }, { name: 'Accordion Window', iconCls: 'grid-shortcut', module: 'MyDesktop.TabWindow' }, { name: 'Accordion Window1', iconCls: 'grid-shortcut', module: 'MyDesktop.GridWindow'}] },
                    { name: 'Accordion Window', iconCls: 'accordion-shortcut', getChildMenu: [{ name: 'Accordion Window', iconCls: 'grid-shortcut', module: 'MyDesktop.GridWindow'}] },
                    { name: 'Notepad', iconCls: 'notepad-shortcut', getChildMenu: [{ name: 'Notepad', iconCls: 'notepad-shortcut', module: 'MyDesktop.TabWindow'}] },
                    { name: 'System Status', iconCls: 'cpu-shortcut', getChildMenu: [{ name: 'System Status', iconCls: 'cpu-shortcut', module: 'MyDesktop.GridWindow'}] }
                ]
        })
        me.insertStartMenu();
        me.insertStartPnlTool();
        me.items = [
            { xtype: 'wallpaper', id: me.id + '_wallpaper' },
            me.createDataView()
        ];
        me.callParent();
        me.shortcutsView = me.items.getAt(1);
        me.shortcutsView.on('itemclick', me.onShortcutItemClick, me);
        
        var wallpaper = 'wallpapers/Blue-Sencha.jpg'; // me.wallpaper;
        me.wallpaper = me.items.getAt(0);
        if (wallpaper) {
            me.setWallpaper(wallpaper, me.wallpaperStretch);
        }
    },

    afterRender: function() {
        var me = this;
        me.callParent();
        me.el.on('contextmenu', me.onDesktopMenu, me);
        Ext.Function.defer(me.initShortcut, 1);
    },

    //------------------------------------------------------
    // Overrideable configuration creation methods

    createDataView: function() {
        var me = this;
        return {
            xtype: 'dataview',
            overItemCls: 'x-view-over',
            trackOver: true,
            itemSelector: me.shortcutItemSelector,
            store: me.shortcuts,
            style: {
                position: 'absolute'
            },
            x: 0, y: 0,
            listeners: {
                resize: me.initShortcut
            }, 
            tpl: new Ext.XTemplate(me.shortcutTpl)
        };
    },
    //处理桌面图标自动换行问题
    initShortcut: function() {
        var btnHeight = 64;
        var btnWidth = 64;
        var btnPadding = 30;
        var col = { index: 1, x: btnPadding };
        var row = { index: 1, y: btnPadding };
        var bottom;
        var numberOfItems = 0;
        var taskBarHeight = Ext.query(".ux-taskbar")[0].clientHeight + 40;
        var bodyHeight = Ext.getBody().getHeight() - taskBarHeight;
        var items = Ext.query(".ux-desktop-shortcut");

        for (var i = 0, len = items.length; i < len; i++) {
            numberOfItems += 1;
            bottom = row.y + btnHeight;
            if (((bodyHeight < bottom) ? true : false) && bottom > (btnHeight + btnPadding)) {
                numberOfItems = 0;
                col = { index: col.index++, x: col.x + btnWidth + btnPadding };
                row = { index: 1, y: btnPadding };
            }
            Ext.fly(items[i]).setXY([col.x, row.y]);
            row.index++;
            row.y = row.y + btnHeight + btnPadding;
        }
    },
    //------------------------------------------------------
    // Event handler methods
    //桌面右键事件
    onDesktopMenu: function(e) {
        var me = this, menu = me.contextMenu;
        e.stopEvent();
        if (!menu.rendered) {
            menu.on('beforeshow', me.onDesktopMenuBeforeShow, me);
        }
        menu.showAt(e.getXY());
        menu.doConstrain();
    },
    //桌面右键菜单显示前事件
    onDesktopMenuBeforeShow: function(menu) {
        var me = this, count = me.windows.getCount();

        menu.items.each(function(item) {
            var min = item.minWindows || 0;
            item.setDisabled(count < min);
        });
    },
    //点击桌面快捷方式事件
    onShortcutItemClick: function(dataView, record) {
        var me = this;
        me.ShowWindow(record.data.module);
    },
    ShowWindow: function(wincls) {
        var me = this;
        var windowid = 'windows-' + wincls;
        var win = me.getWindow(windowid);
        if (!win) {     //不存在
            Ext.require(wincls, function() {
                var mw = Ext.create(wincls);
                win = mw.createWindow();
                stateful: false;
                me.add(win);
                win.isWindow = true;
                win.constrainHeader = true;
                win.minimizable = true;
                win.maximizable = true;
                win.id = windowid;
                me.windows.add(win);
                win.taskButton = me.taskbar.addTaskButton(win);
                win.animateTarget = win.taskButton.el;
                win.on({
                    activate: me.updateActiveWindow,
                    beforeshow: me.updateActiveWindow,
                    deactivate: me.updateActiveWindow,
                    minimize: me.minimizeWindow,
                    destroy: me.onWindowClose,
                    scope: me
                });

                win.on({
                    boxready: function() {
                        win.dd.xTickSize = me.xTickSize;
                        win.dd.yTickSize = me.yTickSize;
                        if (win.resizer) {
                            win.resizer.widthIncrement = me.xTickSize;
                            win.resizer.heightIncrement = me.yTickSize;
                        }
                    },
                    single: true
                });

                // replace normal window close w/fadeOut animation:
                win.doClose = function() {
                    win.doClose = Ext.emptyFn; // dblclick can call again...
                    win.el.disableShadow();
                    win.el.fadeOut({
                        listeners: {
                            afteranimate: function() {
                                win.destroy();
                            }
                        }
                    });
                };
                me.restoreWindow(win);
            });
        }
        else {
            me.restoreWindow(win);
        }
    },
    insertStartPnlTool: function() {
        var me = this;
        me.StartPnlTool = Ext.create('Ext.toolbar.Toolbar', {
            dock: 'bottom',
            items: ['->', { text: '修改密码', iconCls: 'accordion', handler: Ext.bind(me.onSystemFunClick, me, ['修改密码']) },
                { text: '帮助', iconCls: 'settings', handler: Ext.bind(me.onSystemFunClick, me, ['帮助']) },
                { text: '退出', iconCls: 'logout', handler: Ext.bind(me.onSystemFunClick, me, ['退出']) }
                ]
        });
        me.taskbar.startMenu.rightpnl.addDocked(me.StartPnlTool, 'bottom');
    },
    insertStartMenu: function() {
        var me = this;
        me.menus.each(function(record) {
            me.taskbar.startMenu.menu.add([{ text: record.get('name'), iconCls: record.get('iconCls')}]);
        });
    },
    showMenuChildItem: function(menu) {
        var me = this;
        var iIndex = me.menus.find('name', menu);
        if (iIndex < 0) return;
        me.taskbar.startMenu.rightpnl.removeAll(true);
        var datamodel = me.menus.getAt(iIndex);
        for (var i = 0; i < datamodel.raw.getChildMenu.length; i++) {
            var btnhtml = '<div id="' + datamodel.raw.getChildMenu[i].name + '-menupnl">' +
        '<div class="ux-start-pnl-icon ' + datamodel.raw.getChildMenu[i].iconCls + '">' +
        '<img src="' + Ext.BLANK_IMAGE_URL + '" title="' + datamodel.raw.getChildMenu[i].name + '">' +
        '</div>' +
        '<span class="ux-start-pnl-text">' + datamodel.raw.getChildMenu[i].name + '</span>' +
        '</div>' +
        '<div class="x-clear"></div>';
            me.taskbar.startMenu.rightpnl.add({ xtype: 'button', style: { margin: '10px', padding: '4px' }, title: datamodel.raw.getChildMenu[i].name, html: btnhtml, width: 72, height: 72, handler: Ext.bind(me.ShowWindow, me, [datamodel.raw.getChildMenu[i].module])
            });
        }
    },
    onSystemFunClick: function(fun) {
        alert(fun);
    },
    onWindowClose: function(win) {
        var me = this;
        me.windows.remove(win);
        me.taskbar.removeTaskButton(win.taskButton);
        me.updateActiveWindow();
    },

    //------------------------------------------------------
    // Window context menu handlers

    onWindowMenuBeforeShow: function(menu) {
        var items = menu.items.items, win = menu.theWin;
        items[0].setDisabled(win.maximized !== true && win.hidden !== true); // Restore
        items[1].setDisabled(win.minimized === true); // Minimize
        items[2].setDisabled(win.maximized === true || win.hidden === true); // Maximize
    },

    onWindowMenuClose: function() {
        var me = this, win = me.windowMenu.theWin;
        win.close();
    },

    onWindowMenuHide: function(menu) {
        Ext.defer(function() {
            menu.theWin = null;
        }, 1);
    },

    onWindowMenuMaximize: function() {
        var me = this, win = me.windowMenu.theWin;
        win.maximize();
        win.toFront();
    },

    onWindowMenuMinimize: function() {
        var me = this, win = me.windowMenu.theWin;
        win.minimize();
    },

    onWindowMenuRestore: function() {
        var me = this, win = me.windowMenu.theWin;
        me.restoreWindow(win);
    },
    onSettings: function() {
        var dlg = new MyDesktop.Settings({
            desktop: this
        });
        dlg.show();
    },
    //------------------------------------------------------
    // Dynamic (re)configuration methods

    getWallpaper: function() {
        return this.wallpaper.wallpaper;
    },

    setTickSize: function(xTickSize, yTickSize) {
        var me = this,
            xt = me.xTickSize = xTickSize,
            yt = me.yTickSize = (arguments.length > 1) ? yTickSize : xt;

        me.windows.each(function(win) {
            var dd = win.dd, resizer = win.resizer;
            dd.xTickSize = xt;
            dd.yTickSize = yt;
            resizer.widthIncrement = xt;
            resizer.heightIncrement = yt;
        });
    },

    setWallpaper: function(wallpaper, stretch) {
        this.wallpaper.setWallpaper(wallpaper, stretch);
        return this;
    },

    //------------------------------------------------------
    // Window management methods

    cascadeWindows: function() {
        if (this.windows.getCount() <= 0) return;
        var x = 0, y = 0,
            zmgr = this.getDesktopZIndexManager();

        zmgr.eachBottomUp(function(win) {
            if (win.isWindow && win.isVisible() && !win.maximized) {
                win.setPosition(x, y);
                x += 20;
                y += 20;
            }
        });
    },
    getActiveWindow: function() {
        var win = null,
            zmgr = this.getDesktopZIndexManager();

        if (zmgr) {
            // We cannot rely on activate/deactive because that fires against non-Window
            // components in the stack.

            zmgr.eachTopDown(function(comp) {
                if (comp.isWindow && !comp.hidden) {
                    win = comp;
                    return false;
                }
                return true;
            });
        }

        return win;
    },

    getDesktopZIndexManager: function() {
        var windows = this.windows;
        // TODO - there has to be a better way to get this...
        return (windows.getCount() && windows.getAt(0).zIndexManager) || null;
    },

    getWindow: function(id) {
        return this.windows.get(id);
    },

    minimizeWindow: function(win) {
        win.minimized = true;
        win.hide();
    },

    restoreWindow: function(win) {
        if (win.isVisible()) {
            win.restore();
            win.toFront();
        } else {
            win.show();
        }
        return win;
    },

    tileWindows: function() {
        var me = this, availWidth = me.body.getWidth(true);
        var x = me.xTickSize, y = me.yTickSize, nextY = y;

        me.windows.each(function(win) {
            if (win.isVisible() && !win.maximized) {
                var w = win.el.getWidth();

                // Wrap to next row if we are not at the line start and this Window will
                // go off the end
                if (x > me.xTickSize && x + w > availWidth) {
                    x = me.xTickSize;
                    y = nextY;
                }

                win.setPosition(x, y);
                x += w + me.xTickSize;
                nextY = Math.max(nextY, y + win.el.getHeight() + me.yTickSize);
            }
        });
    },
    showDesktop: function() {
        var me = this;
        me.windows.each(function(win) {
            if (win.isVisible()) {
                win.minimize();
            }
        });
    },
    updateActiveWindow: function() {
        var me = this, activeWindow = me.getActiveWindow(), last = me.lastActiveWindow;
        if (activeWindow === last) {
            return;
        }

        if (last) {
            if (last.el.dom) {
                last.addCls(me.inactiveWindowCls);
                last.removeCls(me.activeWindowCls);
            }
            last.active = false;
        }

        me.lastActiveWindow = activeWindow;

        if (activeWindow) {
            activeWindow.addCls(me.activeWindowCls);
            activeWindow.removeCls(me.inactiveWindowCls);
            activeWindow.minimized = false;
            activeWindow.active = true;
        }
        me.taskbar.setActiveButton(activeWindow && activeWindow.taskButton);
    }
});