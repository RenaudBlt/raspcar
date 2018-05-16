import obd

# OBD setup
obd.logger.setLevel(obd.logging.DEBUG)

# Connection à l'adapteur OBDII
ports = obd.scan_serial() 
print("Ports: ") 
print(ports) 

connection = obd.OBD(ports[0])

#connection = obd.OBD() # auto connect 
print("Connection status: ") 
print(connection.status())

# liste des commandes supporté
commands = connection.supported_commands 
print("Supported commands: ") 
for command in commands:
  print(command.name)

# Envoie des commandes
while True:
  command = input("Enter command (type 'quit' to exit): ")
  if (command == "quit"):
    break
  try:
    # Test d'nvoie de commandes
    #res = connection.query(obd.commands[command])
    # Test d'envoie de commandes forcés
    res = connection.query(obd.commands[command], force=True)
    print(res.value)
  except Exception as ex:
    print("Error: " + str(ex))

# Close the connection
connection.close()
