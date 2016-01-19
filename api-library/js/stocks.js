// JavaScript Document

//Φόρτωση Πίνακα Μετοχών
function loadstocks(resp)
{
	stockstable=document.getElementById("stockstable");
	sto = '{"allstocks":'+resp+"}";
	stock = JSON.parse(sto);
	stockstable.innerHTML="<thead><th>Μετοχή</th><th>Τιμή</th><th>Τάση</th></thead><tbody>";
	var s="";
	for (i=0;i<stock.allstocks.length; i++)
	{
		if (stock.allstocks[i].stock_current_price > stock.allstocks[i].stock_previous_price)
			{s="<TR class='success'>";}
		else if (stock.allstocks[i].stock_current_price < stock.allstocks[i].stock_previous_price)
			{s="<TR class='danger'>";}
		else if (stock.allstocks[i].stock_current_price == stock.allstocks[i].stock_previous_price)
			{s="<TR class='active'>";}	    
		
		s+="<TD>"+stock.allstocks[i].stock_name+"</TD>";
		
		s+="<TD>"+stock.allstocks[i].stock_current_price+"</TD>";
		
		if (stock.allstocks[i].stock_current_price > stock.allstocks[i].stock_previous_price)
			{s+="<TD><i class='fa fa-level-up'></i></TD>";}
		else if (stock.allstocks[i].stock_current_price < stock.allstocks[i].stock_previous_price)
			{s+="<TD><i class='fa fa-level-down'></i></TD>";}
		else if (stock.allstocks[i].stock_current_price == stock.allstocks[i].stock_previous_price)
			{s+="<TD><i class='fa fa-stop'></i></TD>";}

		s+="<TD><a data-toggle='modal' data-target='#nea_entolh_agoras' href='javascript:void(0);'><i class='fa fa-fw fa-plus'></i>Αγορά</a></TD>";

		s+="</TR>";
		stockstable.innerHTML+=s;	
	};
	stockstable.innerHTML+="</tbody>";	

}




//Φόρτωση Eντολών Πώλησης
function loadsales(resp)
{
	salestable=document.getElementById("salestable");
	sa = '{"allsales":'+resp+"}";
	sale = JSON.parse(sa);
	salestable.innerHTML="<thead><th>Κατάσταση</th><th>Μετοχή</th><th>Τιμή Πώλησης</th><th>Κομμάτια</th><th>Ημ.Εντολής</th><th>Ημ.Λήξης Εντολής</th></thead><tbody>";
	var s="";
	for (i=0;i<sale.allsales.length; i++)
	{
		if (sale.allsales[i].s_state == 0)
		{
			s="<TR class='info'>";
			s+="<TD><span class='label label-primary'>Ενεργή!</span></TD>";
		}
		else if (sale.allsales[i].s_state == 1)
		{
			s="<TR class='info'>";
			s+="<TD><span class='label label-primary'>Ενεργή!<br/>(Μερικώς Εκτελεσμένη)</span></TD>";
		}
		else if (sale.allsales[i].s_state == 2)
		{
			s="<TR class='danger'>";
			s+="<TD><span class='label label-danger'>Ληγμένη!</span></TD>";
		}
		else if (sale.allsales[i].s_state == 3)
		{
			s="<TR class='success'>";
			s+="<TD><span class='label label-success'>Εκτελεσμένη!</span></TD>";
		}
				
		s+="<TD>"+sale.allsales[i].stock_name+"</TD>";
		s+="<TD>"+sale.allsales[i].s_price+"</TD>";
		s+="<TD>"+sale.allsales[i].s_pieces+"</TD>";
		s+="<TD>"+sale.allsales[i].s_input_date+"</TD>";
		s+="<TD>"+sale.allsales[i].s_expire_date+"</TD>";
				
		s+="</TR>";
		salestable.innerHTML+=s;	
	};
	salestable.innerHTML+="</tbody>";	

}



//Φόρτωση Eντολών Αγοράς
function loadpurchases(resp)
{
	purchasestable=document.getElementById("purchasestable");
	pu = '{"allpurc":'+resp+"}";
	purc = JSON.parse(pu);
	purchasestable.innerHTML="<thead><th>Κατάσταση</th><th>Μετοχή</th><th>Τιμή Πώλησης</th><th>Κομμάτια</th><th>Ημ.Εντολής</th><th>Ημ.Λήξης Εντολής</th></thead><tbody>";
	var s="";
	for (i=0;i<purc.allpurc.length; i++)
	{
		if (purc.allpurc[i].p_state == 0)
		{
			s="<TR class='info'>";
			s+="<TD><span class='label label-primary'>Ενεργή!</span></TD>";
		}
		else if (purc.allpurc[i].p_state == 1)
		{
			s="<TR class='info'>";
			s+="<TD><span class='label label-primary'>Ενεργή!<br/>(Μερικώς Εκτελεσμένη)</span></TD>";
		}
		else if (purc.allpurc[i].p_state == 2)
		{
			s="<TR class='danger'>";
			s+="<TD><span class='label label-danger'>Ληγμένη!</span></TD>";
		}
		else if (purc.allpurc[i].p_state == 3)
		{
			s="<TR class='success'>";
			s+="<TD><span class='label label-success'>Εκτελεσμένη!</span></TD>";
		}
				
		s+="<TD>"+purc.allpurc[i].stock_name+"</TD>";
		s+="<TD>"+purc.allpurc[i].p_price+"</TD>";
		s+="<TD>"+purc.allpurc[i].p_pieces+"</TD>";
		s+="<TD>"+purc.allpurc[i].p_input_date+"</TD>";
		s+="<TD>"+purc.allpurc[i].p_expire_date+"</TD>";
				
		s+="</TR>";
		purchasestable.innerHTML+=s;	
	};
	purchasestable.innerHTML+="</tbody>";	

}


//Φόρτωση Ονομάτων Μετοχών Χρήστη με συνολικό κόστος για την κάθε είδος Μετοχής
function loaduserstocks(resp)
{
	userstockstable=document.getElementById("userstockstable");
	userst = '{"allustocks":'+resp+"}";
	usstocks = JSON.parse(userst);
	userstockstable.innerHTML="<thead><th>Όνομα Μετοχής</th><th>Κομμάτια</th><th>Τρέχουσα Τιμή</th><th>Συνολικό Κόστος</th></thead><tbody>";
	var s="";
	for (i=0;i<usstocks.allustocks.length; i++)
	{
		s="<TR>";		
		s+="<TD>"+usstocks.allustocks[i].stock_name+"</TD>";
		s+="<TD>"+usstocks.allustocks[i].pieces+"</TD>";
		s+="<TD>"+usstocks.allustocks[i].stock_current_price+"</TD>";
		s+="<TD>"+usstocks.allustocks[i].total+"</TD>";
		s+="<TD><a data-toggle='modal' data-target='#nea_entolh_polhshs' href='javascript:void(0);'><i class='fa fa-fw fa-minus'></i>Πώληση</a></TD>";				
		s+="</TR>";
		userstockstable.innerHTML+=s;	
	};
	userstockstable.innerHTML+="</tbody>";	

}

//Φόρτωση Μετοχών Χρήστη σε σύνολο χρημάτων
function loadsum(resp)
{
	sumstocks=document.getElementById("sumstocks");
	su = '{"allsum":'+resp+"}";
	sumst = JSON.parse(su);
	var totalst=0;
	for (i=0;i<sumst.allsum.length; i++)
	{
		totalst = totalst + parseFloat(sumst.allsum[i].total);
				
	};
	sumstocks.innerHTML=totalst+"€";	

}

//Φόρτωση Πορτοφόλι
function loadwallet(resp)
{
	swallet=document.getElementById("swallet");
	w = '{"allwall":'+resp+"}";
	wall = JSON.parse(w);
	var wallet=0;
	var wallet2=0;
	for (i=0;i<wall.allwall.length; i++)
	{
		wallet = parseFloat(wall.allwall[i].u_wallet);
		wallet2 = parseFloat(wall.allwall[i].u_wallet2);
				
	};
	swallet.innerHTML="E:"+wallet+"€  Δ:"+wallet2+"€";	

}