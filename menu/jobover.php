<!--
	Imam Pirdaus
	namasayaimam@gmail.com
	-->
	<!DOCTYPE html>
<html>
<head>
<title>Captcha dengan Javascript</title>
<style>
.captcha
{ font: italic bold 16px "Comic Sans MS", cursive, sans-serif; 
color:#a0a0a0;background-color:#c0c0c0;
width:100px;border-radius: 5px;
text-align:center;
text-decoration:line-through;
}
.errmsg
{color:#ff0000;}
</style>
<script>
var captcha= new Array ();
//------------------------------------------------------------------------------//
function validateRecaptcha(){
		    var name_job =$("#name_job").val();
            var mail_job =$("#mail_job").val();
            var desc_job =$("#desc_job").val();
            var salary_job =$("#salary_job").val();
			var recaptcha =$("#recaptcha").val();
			
			 if(name_job == ''){
                document.getElementById('errName').innerHTML = '*';
				}else{
				document.getElementById('errName').innerHTML = '';
				}
			 if(mail_job == ''){
                document.getElementById('errMail').innerHTML = '*';
				}else{
				document.getElementById('errMail').innerHTML = '';
				}
			 if(desc_job == ''){
                document.getElementById('errDesc').innerHTML = '*';
				}else{
				document.getElementById('errDesc').innerHTML = '';
				}
			 if(salary_job == ''){
                document.getElementById('errSalary').innerHTML = '*';	
				}else{
				document.getElementById('errSalary').innerHTML = '';
				}
			 if(recaptcha == ''){
				document.getElementById('errCaptcha').innerHTML = '*';
				}else{
				document.getElementById('errCaptcha').innerHTML = '';
				}
			 if(name_job == ''|| mail_job == '' || desc_job == '' || salary_job == '' || recaptcha == ''){
				document.getElementById('errAll').innerHTML = 'cannot be empty !';
				}else{
				
				var recaptcha= document.getElementById("recaptcha").value;;
				var validRecaptcha=0;
				for(var z=0; z<6; z++){
					if(recaptcha.charAt(z)!= captcha[z]){
						validRecaptcha++;
					}
				}
				if (recaptcha == ""){
					document.getElementById('errCaptcha').innerHTML = '*';
					document.getElementById('errAll').innerHTML = 'cannot be empty !';
				} else if (validRecaptcha>0 || recaptcha.length>6){
					document.getElementById('errCaptcha').innerHTML = 'Sorry, Wrong Re-Captcha';
					document.getElementById('errAll').innerHTML = '';
				} else{
				document.getElementById('errCaptcha').innerHTML = '';
				imam();
					
					
					}
    }
}
//------------------------------------------------------------------------------//
function createCaptcha(){
    for(q=0; q<6 ; q++){
        if(q %2 ==0){
            captcha[q] = String.fromCharCode(Math.floor((Math.random()*26)+65));
        }else{      
            captcha[q] = Math.floor((Math.random()*10)+0);
        }
    }
    thecaptcha=captcha.join("");
    document.getElementById('captcha').innerHTML=
     "<span class='captcha'> " + thecaptcha+ " </span>" + "&nbsp; <a onclick='createCaptcha()' href='#'>recaptcha</a>"; 
}
//------------------------------------------------------------------------------//
function eraseText() {
    document.getElementById("name_job").value = "";
	document.getElementById("mail_job").value = "";
	document.getElementById("desc_job").value = "";
	document.getElementById("salary_job").value = "";
	document.getElementById("recaptcha").value = "";
	document.getElementById("errName").innerHTML = "";
	document.getElementById("errMail").innerHTML = "";
	document.getElementById("errDesc").innerHTML = "";
	document.getElementById("errSalary").innerHTML = "";
	document.getElementById("errCaptcha").innerHTML = "";
	document.getElementById("errAll").innerHTML = "";
}
//------------------------------------------------------------------------------//
        function imam(){
			var name_job =$("#name_job").val();
            var mail_job =$("#mail_job").val();
            var desc_job =$("#desc_job").val();
            var salary_job =$("#salary_job").val();
                $.ajax({
                  url : 'crud/proses.php?page=tambah',
                  type : 'post',
                  data : 'name_job=' +name_job+ '&mail_job=' +mail_job+ '&desc_job=' +desc_job+ '&salary_job='+salary_job,
                  success : function(msg){
                        if(msg == 'sukses'){
						  eraseText();
                          alert("the message was successfully sent");
						  createCaptcha();
						  
                        }else{
                          alert("Gagal");
                  }
                      }
                });
            }
//------------------------------------------------------------------------------//			
	function validAngka(a){
		if(!/^[0-9.]+$/.test(a.value))
		{
		a.value = a.value.substring(0,a.value.length-1000);
		}}
		
//------------------------------------------------------------------------------//					
	function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function angkadanhuruf(e, goods, field)
{
var angka, karakterangka;
angka = getkey(e);
if (angka == null) return true;
 
karakterangka = String.fromCharCode(angka);
karakterangka = karakterangka.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(karakterangka) != -1)
    return true;
// control angka
if ( angka==null || angka==0 || angka==8 || angka==9 || angka==27 )
   return true;
    
if (angka == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}	
</script>
</head>

</html>

	<table id="isi_konten6">
		<tr>
			<td><label for="name_job">Name</label></td>
			<td> : </td>
			<td><input type="text" size="30" id="name_job" maxlength="40"></input><a id="errName" class="errmsg"></a></td>
		</tr>
		<tr>
			<td><label for="mail_job">Email</label></td>
			<td> : </td>
			<td><input type="text" size="30" id="mail_job" maxlength="40"></input><a id="errMail" class="errmsg"></a></td>
		</tr>
		<tr>
			<td><label for="desc_job">Description of work</label></td>
			<td> : </td>
			<td><textarea id="desc_job" rows="2" cols="29" ></textarea><a id="errDesc" class="errmsg"></a></td>
		</tr>
		<tr>
			<td><label for="salary_job">Salary</label></td>
			<td> : </td>
			<td><input type="text" size="4" id="salary_job" maxlength="4" onKeyPress="return angkadanhuruf(event,'0123456789',this)"></input> <label for="salary_job">$</label><a id="errSalary" class="errmsg"></a></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
            <td id="captcha"> <script> createCaptcha(); </script></td>
		</tr>
		<tr>
			<td>Type Captcha</td>
			<td>:</td>
			<td><input type="text" name="recaptcha" id="recaptcha" placeholder="Type the captcha"/><a id="errCaptcha" class="errmsg"></a></td>
		</tr>
		<tr>
			<td><a id="errAll" class="errmsg"></a></td>
			<td></td> 
			<!--<td colspan="2" ><input type="button" value="SEND" id="simpan"/></td>-->
			<td colspan="2" >
				<input type="button" value="SEND" onClick="validateRecaptcha()"/>
				<input type="button" value="CLEAR" onClick="eraseText(this)"/>
			</td>
		</tr>	
	</table>
	
	


	
	
	
	

