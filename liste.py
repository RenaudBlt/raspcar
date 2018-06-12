#!/usr/bin/env python
import obd
import os
# print('lancement du programme')
# Connection à l'adapteur OBDII
os.system('rfcomm bind hci0 00:1D:A5:68:98:8A')
# print('rfcom fais')

ports = obd.scan_serial() 
# print(ports)
connection = obd.OBD(ports[0])
# connection = obd.OBD(fast=False)
# print('connection faite')
# liste des commandes supporté
commands = connection.supported_commands
f = open('/var/www/html/liste_cmd.txt','w')
for command in commands:
  f.write(command.name + '\n')
f.close()
# print('fin')
