define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: true,
                advancedSearch: true,
                pagination: true,
                extend: {
                    index_url: 'testcase/caselist/index',
                    add_url: 'testcase/caselist/add',
                    edit_url: 'testcase/caselist/edit',
                    del_url: 'testcase/caselist/del',
                    multi_url: 'testcase/caselist/multi',
                    table: 'caselist',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'priority', title: __('priority')},
                        {field: 'platform', title: __('platform')},
                        {field: 'casetitle', title: __('title')},
                        {field: 'demand', title: __('demand'), align: 'left'},
                        {field: 'assignTo', title: __('assignTo')},
                        {field: 'updatetime', title: __('updatetime'),formatter: Table.api.formatter.datetime},
                        {field: 'result', title: __('result'),formatter: Table.api.formatter.result},
                        {field: 'builder', title: __('builder')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                $(document).on("change", "#c-type", function () {
                    $("#c-pid option[data-type='all']").prop("selected", true);
                    $("#c-pid option").removeClass("hide");
                    $("#c-pid option[data-type!='" + $(this).val() + "'][data-type!='all']").addClass("hide");
                    $("#c-pid").selectpicker("refresh");
                });
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});