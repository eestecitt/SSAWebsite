# PLEEM
PHP Laravel EESTEC Event Manager, focusing the EESTech Challenge (https://eestechchallenge.eestec.net)

## How to set it up

### Local Environment
Everything will run inside a virtual machine on your machine, with all dependencies and tools encapsulated in that machine. We use Vagrant to manage the virtual machine. Depending on your machine the following steps to pull the project and set up for local development may take several minutes.

#### Debian/Ubuntu
```sudo apt-get install git virtualbox vagrant
vagrant plugin install vagrant-reload
git clone https://github.com/eestecitt/EESTechChallengePlatform.git
vagrant up
