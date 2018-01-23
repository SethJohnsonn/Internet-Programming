var total = 5;
var record = "1/15"

function validator() {

    var x = document.forms["form"]["ppl"].value;
    if (x == ""){
        alert("You must have a valid number of people in your league!");
        return false;
    }


}

function pointSystem() {
	
	var firstpick = document.forms["form"]["position"].value;
	var secondpick = document.forms["form"]["position2"].value;
	var ppr = document.forms["form"]["ppr"].value;
	var pick = document.forms["form"]["pick"].value;
	var WRnum = document.forms["form"]["WRnumber"].value;
	var QBnum = document.forms["form"]["QBnumber"].value;
	var RBnum = document.forms["form"]["RBnumber"].value;

	if (ppr == "1"){
	
		switch(firstpick){
		
		case "WR":
			total += 5;
			break;
		case "RB":
			total += 2;
			break;
		case "QB":
			total += 0;
			break;
		case "TE":
			total += 2;
			break;
		case "DEF": 
			total -= 4;
			break;
		case "K":
			total -= 8;
			break;
		default:
			total += 0;
		}
		

		switch(secondpick){

		case "WR":
			total += 8;
			break;
		case "RB":
			total += 3;
			break;
		case "QB":
			total += 4;
			break;
		case "TE":
			total += 3;
			break;
		case "DEF": 
			total -= 4;
			break;
		case "K":
			total -= 8;
			break;
		default:
			total += 0;
		}

		
		if (WRnum >= 4){
			total += 3;
		
		}
		else{
			total -= 2;
			
		}
		if (RBnum >= 4){
			total += 2;
		}
		else{
			total -= 3;
		}
		if (QBnum < 3){
			total += 2;
		}
		else{
			total -= 4;
		}

		
	
	}
	
	if (ppr == "0"){
	
		switch(firstpick){
		
		case "WR":
			total += 2;
			break;
		case "RB":
			total += 5;
			break;
		case "QB":
			total += 2;
			break;
		case "TE":
			total += 2;
			break;
		case "DEF": 
			total -= 4;
			break;
		case "K":
			total -= 8;
			break;
		default:
			total += 0;
		}
		

		switch(secondpick){

		case "WR":
			total += 4;
			break;
		case "RB":
			total += 6;
			break;
		case "QB":
			total += 4;
			break;
		case "TE":
			total += 4;
			break;
		case "DEF": 
			total -= 4;
			break;
		case "K":
			total -= 8;
			break;
		default:
			total += 0;
		}

		
		if (WRnum >= 4){
			total += 3;
		
		}
		else{
			total -= 2;
			
		}
		if (RBnum >= 4){
			total += 3;
		}
		else{
			total -= 5;
		}
		if (QBnum < 3){
			total += 2;
		}
		else{
			total -= 4;
		}

		
	
	}

}

function records() {
		
		switch(total){
	case 1:
		record = "1/15";
		break;
	case 2:
		record = "1/15";
		break;
	case 3:
		record = "2/14";
		break;
	case 4:
		record = "2/14";
		break;
	case 5:
		record = "2/14";
		break;
	case 6:
		record = "3/13";
		break;
	case 7:
	case 8:
		record = "4/12";
		break;
	case 9:
	case 10:
		record = "5/11";
		break;
	case 11:
	case 12:
		record = "6/10";
		break;
	case 13:
		record = "7/9";
		break;
	case 14:
	case 15:
		record = "8/8";
		break;
	case 16:
	case 17:
		record = "10/6";
		break;
	case 18:
		record = "11/5";
		break;
	case 19:
		record = "12/4";
		break;
	case 20:
	case 21:
	case 22:
		record = "13/3";
	case 23:
	case 24:
		record = "14/2";
	case 25:
		record = "15/1";
		
	default:
		record = "8/8";
		break;

	}
}


function doSomething() {

	pointSystem();
	records();
	
	switch(record){
	case "1/15":
		document.write("Your record will be "  + record + ". This is probably because you drafted a kicker or defense in the first round. That's a shame; or maybe you are just a troll and boosting another team, either way, it is abysmal.");
		break;
	case "2/14":
		document.write("Your record will be "  + record + ". This is probably because you drafted a kicker or defense in the first round. That's a shame; or maybe you are just a troll and boosting another team, either way, it is abysmal.");
		break;
	case "3/13":
		document.write("Your record will be "  + record + ". If you go 3-13, i doubt you were trying in your draft. Did you pick a DEF in one of the first two rounds, or a dud of a TE?");
		break;
	case "4/12":
		document.write("Your record will be "  + record + ". Maybe this is your first draft. Maybe you were late and were autopicked for your first 3 or 4. In any case, 4-12 is a season to forget.");
		break;
	case "5/11":
		document.write("Your record will be "  + record + ". Now you are starting to get to where us Jags fans hope we get to in a season, looks like you drafted alright but the wins are slipping out of reach.");
		break;
	case "6/10":
		document.write("Your record will be "  + record + ". You are so close to being at 500! Either drop your extra QB or pick up another RB that isn't injury prone so you will last the whole season!");
		break;
	case "7/9":
		document.write("Your record will be "  + record + ". Fairly average season here, maybe you drafted your TE too early, or don't have enough RB's to last the entire season without injury.");
		break;
	case "8/8":
		document.write("Your record will be "  + record + ".Good job, you did better than probably half of your league, keep it up and you'll be winning the championship soon.");
		break;
	case "9/7":
		document.write("Your record will be "  + record + ". Pretty average season for a pretty average draft, take a kicker and defense later and you will be in double digit wins.");
		break;
	case "10/6":
		document.write("Your record will be "  + record + ". With this record, you probably made the playoffs, nice job! You may be missing that top tier QB if you drafted him too late and that might be the edge they have in the playoffs.");
		break;
	case "11/5":
		document.write("Your record will be "  + record + ". Nothing to be ashamed of here, you definitely made the playoffs and should be looking to go deep. Next season, scan those waiver wires even more!");
		break;
	case "12/4":
		document.write("Your record will be "  + record + ". With only 4 losses on the season, you might be seeing a championship soon. The only advice here is to keep a watch on those waiver wires for the hidden gems week to week.");
		break;
	case "13/3":
		document.write("Your record will be "  + record + ". Maybe things have fallen just right this season. Maybe you are really good at drafting. Whatever the case this strategy will work to secure that league championship!");
		break;
	case "14/2":
		document.write("Your record will be "  + record + ". Wow. Have you tried playing this for money yet? Or is this just beginners luck in fantasy? I see that a lot, but nice job!");
		break;
	case "15/1":
		document.write("Your record will be "  + record + ". You dominated, no one could really beat you because your one loss was probably on a bad bye week. Enjoy it for this year...");
		break;

		
	default:
		document.write("Record: "  + record + " " + total);
		break;

	}
	

	
}
