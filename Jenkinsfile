pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'master',
                    url: 'https://git.education.sn/cisse/sunuparc2.git',
                    credentialsId: 'email'
            }
        }

        stage('Test') {
            steps {
                echo "Running tests..."
            }
        }
    }
}
