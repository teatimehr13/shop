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

function del(table,id){
	let confirms='確定要刪除嗎?';
	if(confirm(confirms)==true){
		$.post("api/del.php",{table,id},()=>{
			history.go(0);
		})
	}
	
}