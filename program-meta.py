"""
	program-meta: Find license, line count, and GitHub origin

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

def get_license(path):
	file = open(path + "/LICENSE")
	license = ""
	is_word = False

	for line in file:
		for char in line:
			if char == '\n':
				break
			if char == ' ' and is_word == False:
				continue

			license += char
			is_word = True
		break

	return license
