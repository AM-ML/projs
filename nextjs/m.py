from subprocess import call
from sys import argv

call(f"cp -rf p0 p{argv[1]}", shell=True)
call("clear", shell=True)
