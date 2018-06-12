import obd
import time
import sys
cmd = sys.argv[1]

# OBD setup
obd.logger.setLevel(obd.loggings)

# Connection à l'adapteur OBDII
ports = obd.scan_serial()

connection = obd.OBD(ports[0])


# liste des commandes supporté
commands = connection.supported_commands 

print("Supported commands: ") 

for command in commands:
  print(command.name)
try:
  res = connection.query(obd.commands[cmd], force=True)
  print(res.value)
except Exception as ex:
  print("Error: " + str(ex))
# break
  
# Close the connection
connection.close()
