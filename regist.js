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
    $("#prefecture_error").empty();
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
    var prefecture  = $("#prefecture").val();
	var raddress_1  = $("#address_1").val();
    var raddress_2  = $("#address_2").val();
    

	// 入力内容チェック
	// お名前
	if(family_name == ""){
		$("#family_name_error").html(" 名前（姓）が未入力です。");
		$("#family_name").addClass("inp_error");
		result = false;
	}else if(family_name.length >10){
		$("#family_name_error").html(" 名前（姓）は10文字以内で入力してください。");
		$("#family_name").addClass("inp_error");
		result = false;
	}else if(!family_name.match(/^[\u3040-\u309f\u30e0-\u9fcf]+$/)){
        $("#family_name_error").html(" 名前（姓）は漢字かひらがなで入力してください。");
		$("#family_name").addClass("inp_error");
		result = false;
    }
    /*if(last_name == ""){
		$("#last_name_error").html(" 名前（名）が未入力です。。");
		$("#last_name").addClass("inp_error");
		result = false;
	}else if(last_name.length >10){
		$("#last_name_error").html(" 名前（名）は10文字以内で入力してください。");
		$("#last_name").addClass("inp_error");
		result = false;
	}/*else if(!last_name.match(/^[\u3040-\u309f\u30e0-\u9fcf]+$/)){
        $("#last_name_error").html(" 名前（名）は漢字かひらがなで入力してください。");
		$("#last_name").addClass("inp_error");
		result = false;
    }
	// フリガナ
	if(family_name_kana == ""){
		$("#family_name_kana_error").html(" カナ（姓）が未入力です。");
		$("#family_name_kana").addClass("inp_error");
		result = false;
	}else if(!family_name_kana.match(/^[\u30a0-\u30ff]+$/)){
		$("#family_name_kana_error").html(" カナ（姓）は全角カタカナで入力してください。");
		$("#family_name_kana").addClass("inp_error");
		result = false;
	}else if(family_name_kana.length > 10){
		$("#family_name_kana_error").html(" カナ（姓）は10文字以内で入力してください。");
		$("#family_name_kana").addClass("inp_error");
		result = false;
	}
    if(last_name_kana == ""){
		$("#last_name_kana_error").html(" カナ（名）が未入力です。");
		$("#last_name_kana").addClass("inp_error");
		result = false;
	}else if(!last_name_kana.match(/^[\u30a0-\u30ff]+$/)){
		$("#last_name_kana_error").html(" カナ（名）は全角カタカナで入力してください。");
		$("#last_name_kana").addClass("inp_error");
		result = false;
	}else if(last_name_kana.length > 10){
		$("#last_name_kana_error").html(" カナ（名）は10文字以内で入力してください。");
		$("#last_name_kana").addClass("inp_error");
		result = false;
	}
	// メールアドレス
	if(mail == ""){
		$("#mail_error").html(" メールアドレスが未入力です。");
		$("#mail").addClass("inp_error");
		result = false;
	}else if(!mail.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
		$('#mail_error').html(" 正しいメールアドレスを入力してください。");
		$("#mail").addClass("inp_error");
		result = false;
	}else if(mail.length > 100){
		$('#mail_error').html(" メールアドレスは100字以内で入力してください。");
		$("#mail").addClass("inp_error");
		result = false;
	}
    //パスワード
    if(password == ""){
		$("#password_error").html(" パスワードが未入力です。");
		$("#password").addClass("inp_error");
		result = false;
	}else if(password.length >10){
		$("#password_error").html(" パスワードは10文字以内で入力してください。");
		$("#password").addClass("inp_error");
		result = false;
	}/*else if(!password.match(/^[0-9a-zA-Z]+$/)){
        $("#password_error").html(" パスワードは10文字以内で入力してください。");
		$("#password").addClass("inp_error");
		result = false;
    }
    //郵便番号
    if(postal_code == ""){
		$("#postal_code_error").html(" 郵便番号が未入力です。");
		$("#postal_code").addClass("inp_error");
		result = false;
	}else if(postal_code.length >7){
		$("#postal_code_error").html(" 郵便番号は7文字以内で入力してください。");
		$("#postal_code").addClass("inp_error");
		result = false;
	}else if(!postal_code.match(/^[0-9]+$/)){
        $("#postal_code_error").html(" 郵便番号は半角数字のみ入力してください。");
		$("#postal_code").addClass("inp_error");
		result = false;
    }
    //住所（都道府県）
    if(prefecture == ""){
		$("#prefecture_error").html(" 住所（都道府県）が未選択です。");
		$("#prefecture").addClass("inp_error");
		result = false;
	}
    //住所（市区町村）
    if(address_1 == ""){
		$("#faddress_1_error").html(" 住所（市区町村）が未入力です。");
		$("#address_1").addClass("inp_error");
		result = false;
	}else if(last_name.length >10){
		$("#address_1_error").html(" 住所（市区町村）は10文字以内で入力してください。");
		$("#address_1").addClass("inp_error");
		result = false;
	}//else if(!address_1.match()){
    
    //}
    //住所（番地）
    if(address_2 == ""){
		$("#address_2_error").html(" 住所（番地）が未入力です。");
		$("#address_2").addClass("inp_error");
		result = false;
	}else if(address_2.length >100){
		$("#address_2_error").html(" 住所（番地）は100文字以内で入力してください。");
		$("#address_2").addClass("inp_error");
		result = false;
	}//else if(!password.match()){
    
    //}*/
    return result;
}