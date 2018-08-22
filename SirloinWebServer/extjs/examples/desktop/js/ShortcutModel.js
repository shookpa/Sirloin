Ext.define('Ext.ux.desktop.ShortcutModel', {
    extend: 'Ext.data.Model',
    fields: [
       { name: 'name' },
       { name: 'iconCls' },
       { name: 'module' }
    ]
   });
   Ext.define('Ext.ux.desktop.MenuModel', {
       extend: 'Ext.data.Model',
       fields: [
           { name: 'name' },
           { name: 'iconCls' }
        ],
           hasMany: { model: 'Ext.ux.desktop.MenuChildModel', name: 'getChildMenu', autoLoad: false }
   });
   Ext.define('Ext.ux.desktop.MenuChildModel', {
           extend: 'Ext.data.Model',
           fields: [
               { name: 'name' },
               { name: 'iconCls' },
               { name: 'module' }
            ],
               belongsTo: 'Ext.ux.desktop.ShortcutModel'
    });