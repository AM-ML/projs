from subprocess import call
from sys import argv

a = argv[1]
b = argv[2]

if ".php" in a:
	call(f"cp p0/index.php p{b}/{a}", shell=True)
else:
	call(f"echo        > p{b}/{a}", shell=True)

call("clear", shell=True)
