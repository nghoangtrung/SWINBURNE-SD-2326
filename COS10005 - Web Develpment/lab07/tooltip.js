/* write functions that define the action for each event */
function showTip () {
	var sidTip = document.getElementById("sidTip"); 		//obtain access to the HTML tool tip element using id "sidTip" and link it a varialbe named sidTip	
	sidTip.style.display = "inline";  										//display the HTML tool tip element sidTip bying change the value of its CSS property "display" to "inline"
}

function hideTip () {  														//this function hides the tool tip
	var sidTip = document.getElementById("sidTip"); 																							//first, get access to the tool tip HTML element											
	sidTip.style.display = "none";  																						//then, hide the tool tip HTML element by changing its CSS property "display" to "none"
}

function showPwdTip () {
	var pwd1Tip = document.getElementById("pwd1Tip"); 		
	pwd1Tip.style.display = "inline";  										
}

function hidePwdTip () {  														
	var pwd1Tip = document.getElementById("pwd1Tip"); 																																		
	pwd1Tip.style.display = "none";  																					
}

function init () {																	/* the init function links functions to appropriate events of corresponding HTML elements */
	var sid = document.getElementById("sid");																							/* create a variable named sid */
	sid.onmouseover = showTip;																						/* get access to the HTML element by its id "sid" and link it to sid */
	sid.onmouseout = hideTip;
	sid.onfocus = showTip;																						/* link function showTip to the onmouseover event of sid */
	sid.onblur = hideTip;
	var pwd1 = document.getElementById("pwd1");																							
	pwd1.onmouseover = showPwdTip;																						
	pwd1.onmouseout = hidePwdTip;
	pwd1.onfocus = showPwdTip;																					
	pwd1.onblur = hidePwdTip;																
}

window.onload = init																							/* link function init to the onload event of the window so that function init will be called when the page is loaded */

