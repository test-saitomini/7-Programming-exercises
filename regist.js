//サイトからコピーしたので明日から実行する。

$(function(){
	$('input:submit[id="btn_submit"]').click(function(){
		if(!input_check()){
			return false;
		}
	});
});

// 入力内容チェックのための関数
function input_check(){
	var result = true;

	// エラー用装飾のためのクラスリセット
	$('#name').removeClass("inp_error");
	$('#furigana').removeClass("inp_error");
	$('#username').removeClass("inp_error");
	$('#mailaddress').removeClass("inp_error");
	$('#tel').removeClass("inp_error");
	$('#remarks').removeClass("inp_error");

	// 入力エラー文をリセット
	$("#name_error").empty();
	$("#furigana_error").empty();
	$("#username_error").empty();
	$("#mailaddress_error").empty();
	$("#tel_error").empty();
	$("#remarks_error").empty();

	// 入力内容セット
	var name   = $("#name").val();
	var furigana  = $("#furigana").val();
	var username = $("#username").val();
	var mailaddress  = $("#mailaddress").val();
	var tel  = $("#tel").val().replace(/[━.*‐.*―.*－.*\–.*ー.*\-]/gi,'');
	var remarks  = $("#remarks").val();

	// 入力内容チェック

	// お名前
	if(name == ""){
		$("#name_error").html(" お名前は必須です。");
		$("#name").addClass("inp_error");
		result = false;
	}else if(name.length > 25){
		$("#name_error").html(" お名前は25文字以内で入力してください。");
		$("#name").addClass("inp_error");
		result = false;
	}
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
	// ユーザー名
	if(username.length > 25){
		$("#username_error").html(" ユーザー名は25文字以内入力してください。");
		$("#username").addClass("inp_error");
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
	}
	// 電話番号
	if(tel == ""){
		$("#tel_error").html(" 電話番号は必須です。");
		$("#tel").addClass("inp_error");
	result = false;
	}else if((!tel.match(/^[0-9]+$/)) || (tel.length < 10)){
		$('#tel_error').html(" 正しい電話番号を入力してください。");
		$("#tel").addClass("inp_error");
		result = false;
	}
	// お問い合わせ内容
	if(remarks == ""){
		$("#remarks_error").html(" お問い合わせ内容は必須です。");
		$("#remarks").addClass("inp_error");
		result = false;
	}else if(remarks.match(/[<(.*)>.*<\/\1>]/)){
		$('#remarks_error').html(" HTML、URLの貼りつけは禁止しています。");
		$("#remarks").addClass("inp_error");
		result = false;
	}else if(remarks.match(/^[ 　\r\n\t]*$/)){
		$('#remarks_error').html(" お問い合わせ内容は必須です。");
		$("#remarks").addClass("inp_error");
		result = false;
	}

	return result;
}