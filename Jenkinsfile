pipeline {
    agent any

    stages {
        stage('Ejecutar playbook Ansible') {
            steps {
                sh 'ansible-playbook -i inventario.ini playbook.yml'
            }
        }
    }
}
