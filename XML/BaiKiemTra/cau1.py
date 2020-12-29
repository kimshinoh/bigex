import xml.etree.ElementTree as ET 
tree = ET.parse('books.xml') 
books = tree.getroot()

for child in books:
    print("ID:",child.attrib["id"],": ")

    for elm in child: 
        # book[elm.tag] = elm.text
        print(" +",elm.tag,":",elm.text)
