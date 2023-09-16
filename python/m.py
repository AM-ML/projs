from sys import argv
from subprocess import call

call(f"cp -rf p0 p{argv[1]}", shell=True)
call("clear")
