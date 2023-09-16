from sys import argv
from subprocess import call

call(f"mkdir p{argv[1]}", shell=True)
call(f"cp p0/page.php p{argv[1]}/page.php", shell=True)
call(f"cp p0/design.css p{argv[1]}/design.css", shell=True)
call(f"cp p0/head.php p{argv[1]}/head.php", shell=True)
call(f"cp p0/foot.php p{argv[1]}/foot.php", shell=True)
# call(f"clear", shell=True)
