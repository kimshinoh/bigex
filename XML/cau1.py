import xml.etree.ElementTree as ET 
tree = ET.parse('sach.xml') 
books = tree.getroot()

for child in books:
    print("-Mã Sách:",child.attrib["id"],": ")

    for elm in child: 
        # book[elm.tag] = elm.text
        print("   +",elm.tag,":",elm.text)