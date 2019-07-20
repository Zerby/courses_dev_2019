from flask import Flask, render_template, request
from flask import redirect
from models import db
from models.Personne import Personne

app = Flask(__name__)
personnes = [{"prenom" : "Clément", "nom" : "Zerbi", "age" : 20}]

# Config de la BDD
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///eemidb.sqlite3'

with app.app_context():
	db.init_app(app)
	db.create_all()

@app.route("/")
def hello():
	liste = Personne.query.all()
	return render_template("index.html", liste=liste)

@app.route("/personne/<id>")
def find(id):
	single = Personne.query.get(id)
	return render_template("single.html", single=single)

@app.route("/delete/<id>")
def deleteSingle(id):
	delete = Personne.query.get(id)
	db.session.delete(delete)
	db.session.commit()
	return redirect("/")

@app.route("/form", methods=["POST"])
def form():
	firstname = request.form.get("firstname")
	lastname = request.form.get("lastname")
	age = request.form.get("age")

	personne = Personne(lastname, firstname, age)
	db.session.add(personne)
	db.session.commit()

	# print(firstname)
	personnes.append({"prenom" : firstname, "nom" : lastname, "age" : age})

	return redirect("/")

app.run(port=8080, debug=True)

# Env dev
# virtualenv monenv
# pip freeze > requirements.txt
# source ./activate

