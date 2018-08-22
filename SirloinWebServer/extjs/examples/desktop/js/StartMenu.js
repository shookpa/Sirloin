Ext.define('Ext.ux.desktop.StartMenu', {
    extend: 'Ext.panel.Panel',
    requires: [
        'Ext.menu.Menu',
        'Ext.toolbar.Toolbar'
    ],
    ariaRole: 'menu',           
    cls: 'x-menu ux-start-menu',
    defaultAlign: 'bl-tl',      
    iconCls: 'ux-start-button-icon',
    title:'菜单',
    floating: true,
    shadow: true,
    width: 500,
    height: 300,    
    initComponent: function() {
        var me = this;
        menu = me.menu;
        me.menu = new Ext.menu.Menu({
            cls: 'ux-start-menu-body',
            border: false, 
            floating: false            
            });
        me.items = [me.menu];
        me.menu.layout.align = 'stretch';
        me.layout = 'fit';

        Ext.menu.Manager.register(me);
        me.callParent();
        me.rightpnl = Ext.create('Ext.panel.Panel', {
        dock: 'right',
        width: 400
        });
        me.rightpnl.layout.align = 'stretch';            
        me.addDocked(me.rightpnl);
        }
    });