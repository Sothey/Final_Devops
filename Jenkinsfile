pipeline {
    agent any
    triggers {
        pollSCM('H/5 * * * *')
    }
    environment {
        ANSIBLE_PLAYBOOK = 'deploy.yml'
        POD_NAME = 'laravel-app-deployment-55f75fdb96-jkvm7'
        EMAIL_RECIPIENT = 'srengty@gmail.com'
    }
    stages {
        stage('Checkout') {
            steps {
                git url: 'https://github.com/Sothey/Final_Devops.git', branch: 'main'
            }
        }
        stage('Build and Test') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
                sh 'npm install && npm run build'
                sh 'cp .env .env.test'
                sh 'sed -i "s/DB_CONNECTION=mysql/DB_CONNECTION=sqlite/" .env.test'
                sh 'sed -i "s/DB_DATABASE=sothey_db/DB_DATABASE=database\\/database.sqlite/" .env.test'
                sh 'touch database/database.sqlite'
                sh 'chmod 664 database/database.sqlite'
                sh 'php artisan migrate --env=testing --force'
                sh 'php artisan test --env=testing || exit 1'
                sh 'touch build-success.txt'
            }
            post {
                failure {
                    script {
                        def culprit = env.CHANGE_AUTHOR_EMAIL ?: 'unknown@unknown.com'
                        emailext (
                            subject: "Build Failed: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                            body: "Build failed. Check ${env.BUILD_URL}.\nCommitter: ${culprit}",
                            to: "${env.EMAIL_RECIPIENT}, ${culprit}",
                            replyTo: '${EMAIL_RECIPIENT}',
                            from: 'jenkins@localhost'
                        )
                    }
                }
            }
        }
        stage('Deploy') {
            when {
                branch 'main'
            }
            steps {
                sh "ansible-playbook ${ANSIBLE_PLAYBOOK} -e 'pod_name=${POD_NAME} mysql_pod_name=${POD_NAME}'"
            }
        }
    }
    post {
        success {
            archiveArtifacts artifacts: 'build-success.txt', allowEmptyArchive: true
        }
    }
}
