from flask import Flask, render_template, request, jsonify
from message import send_sms
import random
app = Flask(__name__)

@app.route('/')
def func1():
	result = ""
	return render_template('index.html', result = result)

otp_map = {}

@app.route('/result', methods = ['POST', 'GET'])
def func2():
	global otp_map
	if request.method == 'POST':
		result = request.form['numbers']
		result = str(result)
		backup_number = result
		result = send_sms(result)
		otp_map[result] = [backup_number, str(random.randint(10000, 99999))]
		return jsonify(result = result)
	else:
		return jsonify(result = "Failed")

@app.route('/verify')
def func3():
	return render_template('verify.html')

@app.route('/verify_otp', methods = ['POST', 'GET'])
def func4():
	global otp_map
	if request.method == 'POST':
		result = request.form['otp']
		password = request.form['password']
		if result in otp_map:
			otp_map[result] = [otp_map[result][0], password]
			return jsonify(result = otp_map, status = "Success")
		else:
			return jsonify(result = otp_map)
	else:
		return jsonify(result = "Failed")

if __name__ == '__main__':
	app.run(debug=True)	
