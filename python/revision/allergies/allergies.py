premier = set([1,2,3])
deuxieme = set([1,5,4])

allergieCommune = premier & deuxieme
'''print(allergieCommune)'''

collection = {
    'user1': [1,2,3],
    'user2': [1,2,5],
    'user3': [1,2,4],
}

Benoit = {'name': 'louis', 'allergies': ["gluten"]}
Mathias = {'name': 'mathias', 'allergies': ["gluten"]}

people = [Benoit, Mathias]

def getMatch(src):
    source_allergies = set(src["allergies"])
    for person in people:
        if person == src:
            continue
        dest_allergie = set(person["allergies"])
        if source_allergies & dest_allergie:
            print(person)

getMatch(mathias)