//サイトからコピーしたので明日から実行する。

$(function(){
	$('input:submit[id="btn_confirm"]').click(function(){
		if(!input_check()){
			return false;
		}
	});
});

// 入力内容チェックのための関数
function input_check(){
	var result = true;

	// エラー用装飾のためのクラスリセット
	$('#family_name').removeClass("inp_error");
    $('#last_name').removeClass("inp_error");
    $('#family_name_kana').removeClass("inp_error");
    $('#last_name_kana').removeClass("inp_error");
	$('#mail').removeClass("inp_error");
	$('#password').removeClass("inp_error");
	$('#postal_code').removeClass("inp_error");
	$('#prefecture').removeClass("inp_error");
	$('#address_1').removeClass("inp_error");
    $('#address_2').removeClass("inp_error");

	// 入力エラー文をリセット
	$("#family_name_error").empty();
	$("#last_name_error").empty();
    $("#family_name_kana_error").empty();
	$("#last_name_kana_error").empty();
	$("#mail_error").empty();
	$("#password_error").empty();
	$("#postal_code_error").empty();
	$("#address_1_error").empty();
    $("#address_2_error").empty();

	// 入力内容セット
	var family_name   = $("#family_name").val();
	var last_name  = $("#last_name").val();
    var family_name_kana   = $("#family_name_kana").val();
	var last_name_kana  = $("#last_name_kana").val();
	var mail = $("#mail").val();
	var password  = $("#password").val();
	var postal_code  = $("#postal_code").val();
	var raddress_1  = $("#address_1").val();
    var raddress_2  = $("#address_2").val();

	// 入力内容チェック

	// お名前
	if(family_name == ""){
		$("#family_name_error").html(" お名前は必須です。");
		$("#family_name").addClass("inp_error");
		result = false;
	}else if(name.length >10){
		$("#family_name_error").html(" お名前は10文字以内で入力してください。");
		$("#family_name").addClass("inp_error");
		result = false;
	}/*
	// フリガナ
	if(furigana == ""){
		$("#furigana_error").html(" フリガナは必須です。");
		$("#furigana").addClass("inp_error");
		result = false;
	}else if(!furigana.match(/^[ァ-ロワヲンー 　\r\n\t]*$/)){
		$("#furigana_error").html(" フリガナは全角カタカナで入力してください。");
		$("#furigana").addClass("inp_error");
		result = false;
	}else if(furigana.length > 25){
		$("#furigana_error").html(" フリガナは25文字以内入力してください。");
		$("#furigana").addClass("inp_error");
		result = false;
	}
	// メールアドレス
	if(mailaddress == ""){
		$("#mailaddress_error").html(" メールアドレスは必須です。");
		$("#mailaddress").addClass("inp_error");
		result = false;
	}else if(!mailaddress.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
		$('#mailaddress_error').html(" 正しいメールアドレスを入力してください。");
		$("#mailaddress").addClass("inp_error");
		result = false;
	}else if(mailaddress.length > 255){
		$('#mailaddress_error').html(" 正しいメールアドレスを入力してください。");
		$("#mailaddress").addClass("inp_error");
		result = false;
	}*/
    return result;
}
