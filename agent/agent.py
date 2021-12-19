import psutil
import pprint
import json
import requests

# SERVER_KEY = "" 

# SYSTEM
SYSTEM = {}
SYSTEM['boot_time'] = psutil.boot_time()
SYSTEM['users']     = psutil.users()

# CPU
CPU = {}
CPU['percent'] = psutil.cpu_percent(interval=1)
CPU['count'] = psutil.cpu_count()

# LOAD
LOAD = {}
LOAD['avg'] = psutil.getloadavg()

# MEMORY
MEMORY = {}
MEMORY['virtual_memory'] = psutil.virtual_memory()
MEMORY['swap_memory'] = psutil.swap_memory()
MEMORY['virtual'] = {
    "total": MEMORY['virtual_memory'].total,
    "available": MEMORY['virtual_memory'].available,
    "percent": MEMORY['virtual_memory'].percent,
    "used": MEMORY['virtual_memory'].used,
    "free": MEMORY['virtual_memory'].free,
}
MEMORY['swap'] = {
    "total": MEMORY['swap_memory'].total,
    "used": MEMORY['swap_memory'].used,
    "free": MEMORY['swap_memory'].free,
    "percent": MEMORY['swap_memory'].percent,
}

# DISK
DISK = {}
DISK['partitions'] = psutil.disk_partitions()
DISK['usage'] = psutil.disk_usage('/')

# PROCESS
PROCESS = []
for p in psutil.process_iter():
    try:
        pinfo = p.as_dict(attrs=['pid', 'name', 'status', 'username'])
        if pinfo['status'] == 'running':
            # pprint.pprint(pinfo)
            PROCESS.append(pinfo)
    except:
        pass

# REPORT
REPORT            = {}
REPORT['system']  = SYSTEM
REPORT['cpu']     = CPU
REPORT['load']    = LOAD
REPORT['memory']  = MEMORY
REPORT['disk']    = DISK
REPORT['users']   = [u.name for u in psutil.users()]
REPORT['process'] = PROCESS

output = json.dumps(REPORT)
# print(output)
# pprint.pprint(REPORT)

# Send Data
res = requests.post("https://srmav.aydemir.im/api/scheduler/data/save/{}".format(SERVER_KEY), json=REPORT)
# print(res.text)