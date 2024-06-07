"""
    Copyright 2024 Eric Hernandez

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        https://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
"""

from flask import Flask, render_template, redirect, url_for
from os import listdir

app = Flask(__name__, template_folder="html")

@app.route("/")
@app.route("/home")
def index():
	return render_template("index.html"), 200

@app.route("/software")
def software():
	return render_template("software.html"), 200

@app.route("/software/<lang>")
def lang(lang):
	projects = listdir("static/lang/" + lang.lower())
	return render_template("lang.html", lang=lang, projects=projects, lang_formatted=lang.capitalize()), 200

@app.route("/software/<lang>/<prog_name>")
def program_name(lang, prog_name):
	project = listdir("static/lang/" + lang.lower() + "/" + prog_name)
	return render_template("program.html", license=None, lang=lang, line_count=None, github=None, program_name=prog_name, project=project), 200

@app.route("/hardware-projects")
def hardware_projects():
	return render_template("hardware-projects.html"), 200

@app.route("/my-computing")
def my_computing():
	return render_template("my-computing.html"), 200

@app.route("/about-me")
def about_me():
	return render_template("about-me.html"), 200

if __name__ == "__main__":
	app.run()
