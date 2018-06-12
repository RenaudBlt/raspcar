#!/usr/bin/env python
import obd
import os
# print('lancement du programme')
# Connection à l'adapteur OBDII
os.system('rfcomm bind hci0 00:1D:A5:68:98:8A')
# print('rfcom fais')
# connection = obd.OBD()
# connection = obd.OBD("/dev/rfcomm0")
ports = obd.scan_serial() 
connection = obd.OBD(ports[0])
# connection = obd.OBD(fast=False)

# print('connection faite')
# liste des commandes supporté
commands = connection.supported_commands
cmd = obd.commands.GET_DTC
response = connection.query(cmd,force=True)
f = open('/var/www/html/code_erreur.txt','w')
f.write(str(response.value))
f.close()
# print('fin')
