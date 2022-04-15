// JavaScript Document
function lof(x)
{
	location.href=x
}

function logout(){
	$.post("api/logout.php",()=>{
		location.href='index.php';
	})
}