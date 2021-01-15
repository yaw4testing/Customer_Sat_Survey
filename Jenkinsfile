pipeline {
    agent any
    parameters {
        choice(name: 'version', choices: ['version 1.2','version 1.3'])
        boolleanValue(name: executeTest, defaultvalue = true)
    }
    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            when{
                expression{
                    params.executeTest
                }
            }
            steps {
                echo 'Testing..project'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
                echo "deploying version ${params.version}"
            }
        }
    }
}
