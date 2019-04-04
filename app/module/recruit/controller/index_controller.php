<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-02
 * @describe:  recruit_index controller class
 * ================
 */
class index_controller
{
    private $data,$index;
    /**
     * 构造函数
     */
    public function __construct()
    {
       
    }
    public function index(){
       
        echo "<!DOCTYPE html>"; 
        echo "<html>"; 
        echo "<head>"; 
        echo "    <meta charset='UTF-8'>"; 
        echo "    <title></title>"; 
        echo "    <script src='http://oss.sheetjs.com/js-xlsx/xlsx.full.min.js'></script>"; 
        echo "</head>"; 
        echo "<body>"; 
        echo "    <input type='file' onchange='importf(this)' />导入智联 <div id='demo'></div>"; 
        echo "    <br />"; 
        echo "    <a href='' download='ETC.xlsx'></a>"; 
        echo "    <a href='' download='ETC.xlsx' id='hf'></a>"; 
        echo "    <input type='file' onchange='import2(this)'>导入51 <div id='sdiv2'></div>"; 
        echo "    <br /><br /><br />"; 
        echo "    <button onclick='downloadExl()'>导出</button> 导出ETC"; 
        echo "    <br />"; 
        echo "    <script>"; 
        echo "        /*"; 
        echo "        FileReader共有4种读取方法："; 
        echo "        1.readAsArrayBuffer(file)：将文件读取为ArrayBuffer。"; 
        echo "        2.readAsBinaryString(file)：将文件读取为二进制字符串"; 
        echo "        3.readAsDataURL(file)：将文件读取为Data URL"; 
        echo "        4.readAsText(file, [encoding])：将文件读取为文本，encoding缺省值为'UTF-8'"; 
        echo "                     */"; 
        echo "        var wb; "; 
        echo "        var rABS = false; "; 
        echo "        function importf(obj) { "; 
        echo "            if (!obj.files) {"; 
        echo "                return;"; 
        echo "            }"; 
        echo "            var f = obj.files[0];"; 
        echo "            var reader = new FileReader();"; 
        echo "            reader.onload = function(e) {"; 
        echo "                var data = e.target.result;"; 
        echo "                if (rABS) {"; 
        echo "                    wb = XLSX.read(btoa(fixdata(data)), { "; 
        echo "                        type: 'base64'"; 
        echo "                    });"; 
        echo "                } else {"; 
        echo "                    wb = XLSX.read(data, {"; 
        echo "                        type: 'binary'"; 
        echo "                    });"; 
        echo "                }"; 
        echo "                var ajax = new XMLHttpRequest();"; 
        echo "                ajax.onreadystatechange = function() {"; 
        echo "                    if (ajax.readyState == 4 && ajax.status == 200) {"; 
        echo "                        document.getElementById('demo').innerHTML = ajax.responseText;"; 
        echo "                    }"; 
        echo "                }"; 
        echo "                ajax.open('post', 'http://192.168.60.175:666/recruit/data/out1', false); "; 
        echo "                "; 
        echo "                ajax.send(JSON.stringify(XLSX.utils.sheet_to_json(wb"; 
        echo "                    .Sheets[wb"; 
        echo "                        .SheetNames[0]])));"; 
        echo "            };"; 
        echo "            if (rABS) {"; 
        echo "                reader.readAsArrayBuffer(f);"; 
        echo "            } else {"; 
        echo "                reader.readAsBinaryString(f);"; 
        echo "            }"; 
        echo "        }"; 
        echo "        function import2(obj) { "; 
        echo "            if (!obj.files) {"; 
        echo "                return;"; 
        echo "            }"; 
        echo "            var f = obj.files[0];"; 
        echo "            var reader = new FileReader();"; 
        echo "            reader.onload = function(e) {"; 
        echo "                var data = e.target.result;"; 
        echo "                if (rABS) {"; 
        echo "                    wb = XLSX.read(btoa(fixdata(data)), { "; 
        echo "                        type: 'base64'"; 
        echo "                    });"; 
        echo "                } else {"; 
        echo "                    wb = XLSX.read(data, {"; 
        echo "                        type: 'binary'"; 
        echo "                    });"; 
        echo "                }"; 
        echo "                var ajax = new XMLHttpRequest();"; 
        echo "                ajax.onreadystatechange = function() {"; 
        echo "                    if (ajax.readyState == 4 && ajax.status == 200) {"; 
        echo "                        document.getElementById('sdiv2').innerHTML = ajax.responseText;"; 
        echo "                    }"; 
        echo "                }"; 
        echo "                ajax.open('post', 'http://192.168.60.175:666/recruit/data/out2', false); "; 
        echo "                "; 
        echo "                ajax.send(JSON.stringify(XLSX.utils.sheet_to_json(wb"; 
        echo "                    .Sheets[wb"; 
        echo "                        .SheetNames[0]])));"; 
        echo "            };"; 
        echo "            if (rABS) {"; 
        echo "                reader.readAsArrayBuffer(f);"; 
        echo "            } else {"; 
        echo "                reader.readAsBinaryString(f);"; 
        echo "            }"; 
        echo "        }"; 
        echo "        function fixdata(data) { "; 
        echo "            var o = '',"; 
        echo "                l = 0,"; 
        echo "                w = 10240;"; 
        echo "            for (; l < data.byteLength / w; ++l) o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w,"; 
        echo "                l * w + w)));"; 
        echo "            o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w)));"; 
        echo "            return o;"; 
        echo "        }"; 
        echo "        var tmpDown; "; 
        echo "        function downloadExl(type) {"; 
        echo "            var ajax = new XMLHttpRequest();"; 
        echo "            ajax.onreadystatechange = function(ok1) {"; 
        echo "                if (ajax.readyState == 4 && ajax.status == 200) {"; 
        echo "                    tmpjson = JSON.parse(ajax.responseText);"; 
        echo "                }"; 
        echo "            }"; 
        echo "            ajax.open('post', 'http://192.168.60.175:666/recruit/data/export', false);"; 
        echo "            ajax.send();"; 
        echo "            var tmpdata = tmpjson[0];"; 
        echo "            "; 
        echo "            tmpjson.unshift({});"; 
        echo "            var keyMap = []; "; 
        echo "            "; 
        echo "            for (var k in tmpdata) {"; 
        echo "                keyMap.push(k);"; 
        echo "                tmpjson[0][k] = k;"; 
        echo "            }"; 
        echo "            var tmpdata = []; "; 
        echo "            tmpjson.map((v, i) => keyMap.map((k, j) => Object.assign({}, {"; 
        echo "                v: v[k],"; 
        echo "                position: (j > 25 ? getCharCol(j) : String.fromCharCode(65 + j)) + (i + 1)"; 
        echo "            }))).reduce((prev, next) => prev.concat(next)).forEach((v, i) => tmpdata[v.position] = {"; 
        echo "                v: v.v"; 
        echo "            });"; 
        echo "            var outputPos = Object.keys(tmpdata); "; 
        echo "            var tmpWB = {"; 
        echo "                SheetNames: ['mySheet'], "; 
        echo "                Sheets: {"; 
        echo "                    'mySheet': Object.assign({},"; 
        echo "                        tmpdata, "; 
        echo "                        {"; 
        echo "                            '!ref': outputPos[0] + ':' + outputPos[outputPos.length - 1] "; 
        echo "                        })"; 
        echo "                }"; 
        echo "            };"; 
        echo "            tmpDown = new Blob([s2ab(XLSX.write(tmpWB, {"; 
        echo "                    bookType: (type == undefined ? 'xlsx' : type),"; 
        echo "                    bookSST: false,"; 
        echo "                    type: 'binary'"; 
        echo "                } "; 
        echo "            ))], {"; 
        echo "                type: ''"; 
        echo "            }); "; 
        echo "            var href = URL.createObjectURL(tmpDown); "; 
        echo "            document.getElementById('hf').href = href; "; 
        echo "            document.getElementById('hf').click(); "; 
        echo "            setTimeout(function() { "; 
        echo "                URL.revokeObjectURL(tmpDown); "; 
        echo "            }, 100);"; 
        echo "        }"; 
        echo "        function s2ab(s) { "; 
        echo "            var buf = new ArrayBuffer(s.length);"; 
        echo "            var view = new Uint8Array(buf);"; 
        echo "            for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;"; 
        echo "            return buf;"; 
        echo "        }"; 
        echo "       "; 
        echo "        function getCharCol(n) {"; 
        echo "            let temCol = '',"; 
        echo "                s = '',"; 
        echo "                m = 0"; 
        echo "            while (n > 0) {"; 
        echo "                m = n % 26 + 1"; 
        echo "                s = String.fromCharCode(m + 64) + s"; 
        echo "                n = (n - m) / 26"; 
        echo "            }"; 
        echo "            return s"; 
        echo "        }"; 
        echo "    </script>"; 
        echo "</body>"; 
        echo "</html> ";
           }
}