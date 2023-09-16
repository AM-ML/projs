from sys import argv
from subprocess import call

call(f"mkdir p{argv[1]}", shell=True)
call(f"echo     > page.php", shell=True)
call(f"echo     > design.css", shell=True)
call(f"mv page.php p{argv[1]}", shell=True)
call(f"mv design.css p{argv[1]}", shell=True)
call(f"clear", shell=True)
