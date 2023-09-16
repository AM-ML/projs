from subprocess import call
from sys import argv
if ".php" in argv[1]:
	call(f"cp p0/page.php {argv[2]}/{argv[1]}", shell=True)
else:
	call(f"echo       > {argv[2]}/{argv[1]}", shell=True)
call(f"cd {argv[2]}", shell=True)
call("clear", shell=True)
