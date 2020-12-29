<h1>XML và Javascipt</h1>
    <a href="sinhvien1.xml">Xem sinhvien.xml</a><br>
    <a href="javascipt:display();">Danh sách sinh viên</a><br>
    <a href="javascipt:bangdiem();">Bảng điểm một sinh viên</a><br>
    <div id="kq"></div>

    <script type="text/javascript">
        var xmlDoc=null;
        function load(){
            var xml=new XMLHttpRequest();
            xml.open("GET","Sinhvien1.xml",false);
            xml.send(null);
            xmlDOC=xml.responXML;
        }
        function display(){
            j=1;
            list=xmlDOC.documentElement.childNodes;
            list=xmlDOC.getElementsByTagName("sinhvien");
            str="<h3>Danh sach sinh vien</h3>";
            for(i=0;i<list.length;i++){
                maso=list[i].getAttribute("maso");
                hoten=list[i].getAttribute("hoten");
                lop=list[i].getAttribute("lop");
                diachi=list[i].getAttribute("diachi");
                str+=j+":"+maso+"-"+hoten+"-"+lop+"-"diachi+"<br>";
            }
            document.getElementById("kq").innerHTML=str;
            load();
        }
        function bangdiem() {
            // In ra bảng điểm của sinh viên, nhập mã số;
            element = find(prompt("Nhập mã sinh viên"));
            if (element != null) {
                list = element.childNodes;
                j=1;
                str"<h3>Bảng điểm của sinh viên</h3>";
                str += hoten+ ", " + lop + "<br><br>";
                for (var i = 0; i < list.length; i++) {
                    if (list[i].nodeType == 1) {
                        monhoc=list[i].getAttribute("tenmh");
                        diem=list[i].textContent;
                        str += j+"-" + monhoc + " - " + diem + "<br>";
                        j++;
                    }
                }
                document.getElementById("kq").innerHTML = str;
            }
            else{
                clear();
                alert("Không ccos sinh viên này");
            }
        }
    </script>