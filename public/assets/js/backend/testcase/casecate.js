define(['jquery', 'bootstrap', 'backend', 'addtabs', 'table', 'echarts', 'echarts-theme'], function ($, undefined, Backend, Datatable, Table, Echarts) {

    var Controller = {
        index: function () {
        	$('#btn').click(function(event){
	        	var url = 'testcase/casecate/index?platform='+$("input[name='platform']:checked").val()+"&begintime="+$("#begintime").val()+"&stoptime="+$("#stoptime").val()
	        	$.getJSON(url,function(datas,status){
	            // 基于准备好的dom，初始化echarts实例
		          	var myChart = Echarts.init(document.getElementById('echarts'));

		        	// 指定图表的配置项和数据
		        	var option = {
		            	title: {
				        	text: '需求用例测试结果分布'
					    },
					    tooltip : {
					    	trigger: 'axis',
					    	axisPointer : {            // 坐标轴指示器，坐标轴触发有效
					            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
					        }
					    },
					    legend: {
					    	data:['失败','阻塞','通过','忽略','新建']
					    },
					    grid: {
					    	left: '3%',
					    	right: '4%',
					    	bottom: '3%',
					    	containLabel: true
					    },
					    xAxis : [
					    {	

					    	type : 'value'
					    }
					    ],
					    yAxis : [
					    {
					    	type : 'category',
					    	data : datas.demand
					    	
					    }
					    ],
					    series : [
					    {
					    	name:'失败',
					    	type:'bar',
					    	stack: '失败',
					    	data:datas.fail
					    },
					    {
					    	name:'阻塞',
					    	type:'bar',
					    	stack: '失败',
					    	data:datas.na
					    },
					    {
					    	name:'通过',
					    	type:'bar',
					    	stack: '失败',
					    	data:datas.pass
					    },
					    {
					    	name:'忽略',
					    	type:'bar',
					    	stack: '失败',
					    	data:datas.nt
					    },
					    {
					    	name:'新建',
					    	type:'bar',
					    	stack: '失败',
					    	data:datas.new
					    }]
					};
		        	myChart.setOption(option);
		        });
	       	});
			
	    }
    };
    return Controller;
});