#! /usr/bin/ python
import obd
import sys
# import os
# os.system('rfcomm bind hci0 00:1D:A5:68:98:8A')
param = sys.argv[1]
# Connection à l'adapteur OBDII
ports = obd.scan_serial() 
connection = obd.OBD(ports[0])


def cmdOdb(param): 
	# liste des commandes supporté
	if param == "RPM":
		cmd = obd.commands.RPM
		response = connection.query(cmd)
	elif param == "SPEED":
		cmd = obd.commands.SPEED
		response = connection.query(cmd)
	elif param == "TEMP":
		cmd = obd.commands.COOLANT_TEMP
		response = connection.query(cmd)
	elif param == "O2":
		cmd = obd.commands.O2_B1S1
		response = connection.query(cmd)
	elif param == "CHARGE":
		cmd = obd.commands.ENGINE_LOAD
		response = connection.query(cmd)
	elif param == "RICHESSE":
		cmd = obd.commands.LONG_FUEL_TRIM_1
		response = connection.query(cmd)
	elif param == "FUEL":
		cmd = obd.commands.FUEL_STATUS
		response = connection.query(cmd)
	elif param == "ERREUR":
		cmd = obd.commands.GET_DTC
		responses = connection.query(cmd)
		f = open('/var/www/html/codes_erreurs/code_erreur.txt','w')
		f.write(str(responses.value))
		f.close()
	elif param == "LISTE":
		# liste des commandes supporté
		commands = connection.supported_commands
		f = open('/var/www/html/liste_cmd.txt','w')
		for command in commands:
		  f.write(command.name + '\n')
		f.close()
	elif not param:
		return "Aucun parametre de renseigne"
	else:
		return "Parametre inconnu"
		
	return response.value

print(cmdOdb(param))
