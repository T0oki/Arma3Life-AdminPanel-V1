Stat_Money(){
	echo "Saving Totalmoney.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=money"`;
	echo $Reponse
	echo ""
}
Stat_Container(){
	echo "Saving ContainerAmount.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=containers"`;
	echo $Reponse
	echo ""
}
Stat_Gang(){
	echo "Saving GangAmount.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=gangs"`;
	echo $Reponse
	echo ""
}
Stat_House(){
	echo "Saving HouseAmount.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=houses"`;
	echo $Reponse
	echo ""
}
Stat_Players(){
	echo "Saving PlayerAmount.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=players"`;
	echo $Reponse
	echo ""
}
Stat_Vehicles(){
	echo "Saving VehiclesAmount.."
	Reponse=`curl -s "admin.iskia.fr/ServerRequest/stats.php?Pass=$PASSWORD&Req=vehicles"`;
	echo $Reponse
	echo ""
}

PASSWORD="c9DZjQQchBFWHe49ujE76p8QaLHsvSp7UUi55UiuaB6JkUj3k73Ti067JBwHC5ADRRrTmuH1ZE7uIO5T";

if [ "$1" == "money" ]
then
        Stat_Money
elif [ "$1" == "containers" ]
then
		Stat_Container
elif [ "$1" == "gangs" ]
then
		Stat_Gang
elif [ "$1" == "houses" ]
then
		Stat_House
elif [ "$1" == "players" ]
then
		Stat_Players
elif [ "$1" == "vehicles" ]
then
		Stat_Vehicles
else
		Stat_Money
		Stat_Container
		Stat_Gang
		Stat_House
		Stat_Players
		Stat_Vehicles
fi
