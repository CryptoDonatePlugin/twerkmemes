function toggle_it(itemID){
    if ((document.getElementById(itemID).style.display == 'inline'))
    {
		document.getElementById(itemID).style.display = 'none';	
    } else {
		document.getElementById(itemID).style.display = 'inline';
		
    }
    }