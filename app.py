from flask import Flask, render_template, request
import psycopg2
from psycopg2 import sql

app = Flask(__name__)

# Database connection parameters
DB_HOST = 'localhost'
DB_NAME = 'events'
DB_USER = 'postgres'
DB_PASS = 'kalam124960'

def get_db_connection():
    conn = psycopg2.connect(
        host=DB_HOST,
        database=DB_NAME,
        user=DB_USER,
        password=DB_PASS
    )
    return conn

@app.route('/')
def index():
    return render_template('signup.html')  # Correct template call

@app.route('/signup', methods=['POST'])
def signup():
    username = request.form['txt']
    email = request.form['email']
    password = request.form['pswd']

    try:
        conn = get_db_connection()
        cur = conn.cursor()
        cur.execute(sql.SQL("INSERT INTO users (username, email, password) VALUES (%s, %s, %s)"), [username, email, password])
        conn.commit()
        cur.close()
        return "User Signed Up Successfully!"
    except Exception as e:
        return f"An error occurred: {e}"
    finally:
        if conn:
            conn.close()

if __name__ == '__main__':
    app.run(debug=True)
