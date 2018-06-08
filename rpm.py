import obd

# Connection à l'adapteur OBDII
ports = obd.scan_serial() 
connection = obd.OBD(ports[0])


# liste des commandes supporté
cmd = obd.commands.RPM

response = connection.query(cmd)

print(response.value)

