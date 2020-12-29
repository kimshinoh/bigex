import xml.etree.ElementTree as ET 
tree = ET.parse('sach.xml') 
books = tree.getroot()

for child in books:
    print("******Id:",child.attrib["id"],"*******")

    for elm in child: 
        print(" -----",elm.tag,":",elm.text)