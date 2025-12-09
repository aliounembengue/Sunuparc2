pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://git.education.sn/cisse/sunuparc2.git
            }
        }

        stage('Test') {
            steps {
                echo "Pipeline OK — Code bien récupéré 🎉"
            }
        }

        stage('Build') {
            steps {
                echo "Ici tu peux ajouter composer install ou autres commandes"
            }
        }
    }
}
