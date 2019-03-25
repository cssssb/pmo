 curl 'https://oapi.dingtalk.com/robot/send?access_token=e6d14990020e5041ae278e7c61b51b19199ea4c5e6f4182c5575cf94fb007190' \
   -H 'Content-Type: application/json' \
   -d '{"msgtype": "text", 
        "text": {
             "content": "我就是我, 是不一样的烟火"
        }
      }'