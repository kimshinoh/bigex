import xml.etree.ElementTree as etree 

tree = etree.parse("C:/Users/TrgNgc/Desktop/bigEx/test/sinhvien.xml") 
sinhviens = tree.getroot()

for child in sinhviens:
    print('--------------------')

    for elm in child: 
        # book[elm.tag] = elm.text
        print("   +",elm.tag,":",elm.text)