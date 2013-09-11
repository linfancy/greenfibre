
!function($, window){

	//页面hover事件
	$('.page').hover(function(){
		$(this).addClass('active');
	}, function(){
		$(this).removeClass('active');
	});

}(window.$ || window.jQuery, window, undefined);

$(function(){
	$('.selectlist').each(function(){
		var base=$(this);
		var trs = $(this).find('tr');
		trs.on('dblclick',function(){
			//$('#example').tooltip(options);
			$('#editdialog').modal('toggle');
			$().button('loading');
		});

	});	
	//dataTransfer('http://127.0.0.1/mytest/index.php',"&foo=bar1",'GET','json');
	//alert(result.status+result.info);
});

/*
* 基础数据传送器
* @param url,data(数据字符串),type(传送类型GET/POST),dataType(数据类型),successCall,brforeCall,errorCall,timeout
*/
function _dataTransfer(url,data,type,dataType,successCall,brforeCall,errorCall,timeout){
	$.ajax({
		url: url,
		data:data,
		type: type,
		//dataType: dataType ,
		timeout: timeout,
		before: eval(brforeCall),
		error: eval(errorCall),
		success: eval(successCall),
	});	
}

function _closeDialog(id){
	$('#'+id).modal('hide');
}

function _reflashArea(id,contant){
	$('#'+id).html(contant);
}

function _reflashFormUrl(id,url){
	var call=function(obj){
		if(obj.status==true) _reflashArea(id,obj.data);
	};
	_dataTransfer(url,'','POST','json','call','','',10000);
}


function formPost(formId,actionUrl,button){
	var _lockButton = function(){
		$("#"+button).val('正在提交,请耐心等待');
		$("#".button).attr({disabled:"disabled"});
	};
	var _tipAndReflash =function(obj){
		if(obj.status==true){
			_reflashFormUrl(obj.refashId,obj.refashUrl);
			$(".modal-body").html("<h2>"+obj.info+"</h2>");
			setTimeout(_closeDialog(formId),1000);
		}
	};
	var _errorTip =function(){
		$("#errorTip").show();
		$("#errorInfo").val("网络传输超时，请重试！");
		setTimeout($("#errorTip").hide(),5000);
		$("#"+button).val('提交');
		$("#"+button).attr({disabled:false});
	};
	_dataTransfer(actionUrl,$("#"+formId).serialize(),'GET','json',_tipAndReflash,_lockButton,_errorTip,10000);
}

function mycall(data){
	alert(data.status);
}