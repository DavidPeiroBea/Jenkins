pipeline {
  agent any

  triggers {
    pollSCM('H/2 * * * *')
  }

  environment {
    SSH_CREDENTIALS_ID = 'UsuarioSSH'
  }

  stages {
    stage('Configurar SSH Known Hosts para GitHub') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          sh '''
            ssh-keyscan -H github.com >> ~/.ssh/known_hosts
            chmod 644 ~/.ssh/known_hosts
          '''
        }
      }
    }

    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Configurar SSH Known Hosts para servidor remoto') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          sh '''
<<<<<<< HEAD
            mkdir -p ~/.ssh
            chmod 700 ~/.ssh
            ssh-keyscan -H 172.32.173.10 >> ~/.ssh/known_hosts
            ssh-keyscan -H github.com >> ~/.ssh/known_hosts
=======
            ssh-keyscan -H 172.32.173.11 >> ~/.ssh/known_hosts
>>>>>>> 26557b5520ef98561d53e63481c72b308a492a10
            chmod 644 ~/.ssh/known_hosts
          '''
        }
      }
    }

    stage('Ejecutar playbook Ansible') {
      steps {
        sshagent([env.SSH_CREDENTIALS_ID]) {
          script {
            def sudoPass = sh(script: 'cat /run/secrets/jenkins-secret', returnStdout: true).trim()
            sh "ansible-playbook -i inventario.ini playbook.yml --extra-vars 'ansible_become_pass=${sudoPass}'"
          }
        }
      }
    }
  }
}
