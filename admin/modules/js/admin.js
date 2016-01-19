// JavaScript Document

//Χρήστες
function loadusers(resp)
{
	userstable=document.getElementById("userstable");
	u = '{"allusers":'+resp+"}";
	user = JSON.parse(u);
	userstable.innerHTML="<thead><th>Όνομα Χρήστη</th><th>Email</th><th>Όνομα</th><th>Επώνυμο</th><th>Ημ.Εγγραφής</th><th>Αδέσμευτα Χρήματα</th><th>Δεσμευμένα Χρήματα</th></thead><tbody>";
	var s="";
	for (i=0;i<user.allusers.length; i++)
	{
		s="<TR>";
				
		s+="<TD>"+user.allusers[i].username+"</TD>";
		
		s+="<TD>"+user.allusers[i].email+"</TD>";
		
		s+="<TD>"+user.allusers[i].u_name+"</TD>";
		
		s+="<TD>"+user.allusers[i].u_surname+"</TD>";
		
		s+="<TD>"+user.allusers[i].u_register_date+"</TD>";
		
		s+="<TD>"+user.allusers[i].u_wallet+"</TD>";
		
		s+="<TD>"+user.allusers[i].u_wallet2+"</TD>";
				
		s+="</TR>";
		userstable.innerHTML+=s;	
	};
	userstable.innerHTML+="</tbody>";	

}