<?php

namespace App\Http\Livewire\Generalinfo;

use App\Models\BankInformation;
use App\Models\Contact;
use App\Models\Dependent;
use App\Models\ItinInformation;
use App\Models\PersonalInformation as ModelsPersonalInformation;
use App\Models\SpouseItin;
use App\Models\Country;
use App\Models\SpousePersonals;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PersonalInformation extends Component
{
    use WithFileUploads;

	public $usCitizen = 'no';
	public $currentStep = 1;
    public $successMsg = '';
    public $firstName;
    public $lastName,$middleName,$TaxpayerDOB,$occupation,
    $TaxpayerCitizenShipStatus,$SSN,$SSNFile,$FilingType,$QualifingDependent;
    public $isSpouseUSCitizen;
    public $dependentList;

    public $DoYouHaveITIN,$WantToApplyForITINTaxpayer;
    public $TaxpayerForiegnPassportUpload;
    public $TaxpayerITIN;
    public $AreYouUSCitizen;

    public $UploadTaxpayerDL =false;
    public $UploadTaxpayeBirthCert=false;
    public $UploadTaxpayerForiegnId=false;

    public $UploadSpouseDL =false;
    public $UploadSpouseBirthCert=false;
    public $UploadSpouseForiegnId=false;



    public $AreYouFilingNonResidentTax;
    //
    public $dl,$fId,$bc;
    public $SpouseSSNCardUpload,$spouseSSN;

    public $SpouseFirstName,$SpouseMiddleName,$SpouseLastName,$spouseDOB,$DoesSpouseHaveITN,$SpouseOccupation, $SpouseITIN;
    public $SpouseWantToApplyForITIN,$SpouseFID,$SpouseBC,$SpouseDL,$SpousePassport,$NonResidentSpouse;
    public $uploadedSpouseSSN, $uploadedSSNCard,$uploadedSpousePassport, $uploadedPassport, $UploadedDL,  $UploadedBirthCert, $UploadedForeignId, $UploadedSpouseDL,$UploadedSpouseBirthCert,$UploadedSpouseForiegnId;
    // public $IsChildNaturalised;

    public $StreetAddress,$City,$Country,$ZIPCode,$TaxPayerPhone,$TaxpayerEmail;

    public $dependentFirstName, $dependentMiddleName,$dependentLastName,$dependentSSN,$dependentSSNDate,$dependentdod,$dependentTaxpayerRelationship,$IsChildNaturalised;
    public $accountType,$accountPhone,$routingNo;
    public $listOfCountries;
    public $CountrieOfCitizenship=[];

    public $dependentsList,$dependentId;

	protected $listeners = ['reload'=>'render', 'uploadedSSNCard','IsUSACitizen','spouseCitizenship',
    'back','backTo', 'nextStep','addNew','moveToTab','setClientCitizenship','fileDeleted'=>'render', 'fileUploadedSuccessfully'=>'render'];
    public function render()
    {
        $this->listOfCountries = Country::select('countrycode','countryname')->get();
        $this->emit('personalInfoStore');
        return view('livewire.generalinfo.personal-information');
    }

    public function mount()
    {
        
        $personals       = ModelsPersonalInformation::where('user_id', UserID())->first();
        
        if($personals){
            $this->firstName       = $personals->first_name;
            $this->lastName        = $personals->last_name;
            $this->middleName      = $personals->middle_name;
            $this->TaxpayerDOB     = $personals->birth_date;
            $this->occupation      = $personals->occupation;
            $this->AreYouUSCitizen = $personals->us_citizen;
            $this->SSN             = $personals->ssn;
            $this->uploadedSSNCard    = $personals->ss_card;
            $this->QualifingDependent = $personals->qualifying_dependent;
            $this->FilingType         = $personals->filing_type;
        }


        $Itin = ItinInformation::where('user_id', UserID())->first();
        if($Itin){
             $this->DoYouHaveITIN = $Itin->itin;
             $this->TaxpayerITIN = $Itin->itin_number;
             $this->WantToApplyForITINTaxpayer = $Itin->apply_itin;
             $this->uploadedPassport = $Itin->passport;
            $this->AreYouFilingNonResidentTax = $Itin->non_resident_tax;

            if(!empty($Itin->driver_license)){
                $this->UploadTaxpayerDL = true;
                $this->UploadedDL = $Itin->driver_license;
            }
            if(!empty($Itin->birth_cert)){
                $this->UploadTaxpayeBirthCert = true;
                $this->UploadedBirthCert = $Itin->birth_cert;
            }
            if(!empty($Itin->foreign_id)){
                $this->UploadTaxpayerForiegnId = true;
                $this->UploadedForeignId = $Itin->foreign_id;
            }
        }


        $SpousePersonals = SpousePersonals::where('user_id', UserID())->first();
        if($SpousePersonals){
            $this->SpouseFirstName = $SpousePersonals->first_name;
            $this->SpouseMiddleName = $SpousePersonals->middle_name;
            $this->SpouseLastName = $SpousePersonals->last_name;
            $this->spouseDOB = $SpousePersonals->birth_date;
            $this->SpouseOccupation = $SpousePersonals->occupation;
            $this->isSpouseUSCitizen = $SpousePersonals->us_citizen;
            $this->spouseSSN = $SpousePersonals->ssn;
            $this->uploadedSpouseSSN = $SpousePersonals->ss_card;
        }

        $SpouseItin = SpouseItin::where('user_id', UserID())->first();
        if($SpouseItin){
             $this->DoesSpouseHaveITN = $SpouseItin->itin;
             $this->SpouseITIN = $SpouseItin->itin_number;
             $this->SpouseWantToApplyForITIN = $SpouseItin->apply_itin;
             $this->uploadedSpousePassport = $SpouseItin->passport;

            if(!empty($SpouseItin->driver_license)){
                $this->UploadSpouseDL = true;
                $this->UploadedSpouseDL = $SpouseItin->driver_license;
            }
            if(!empty($SpouseItin->birth_cert)){
                $this->UploadSpouseBirthCert = true;
                $this->UploadedSpouseBirthCert = $SpouseItin->birth_cert;
            }
            if(!empty($SpouseItin->foreign_id)){
                $this->UploadSpouseForiegnId = true;
                $this->UploadedSpouseForiegnId = $SpouseItin->foreign_id;
            }


            $this->NonResidentSpouse = $SpouseItin->non_resident_tax;


        }


        //$Dependent = Dependent::where('user_id', UserID())->first();
        $this->dependentsList = Dependent::where('user_id', UserID())->get();
        // if($Dependent){
        //     $this->dependentFirstName = $Dependent->first_name;
        //     $this->dependentMiddleName = $Dependent->middle_name;
        //     $this->dependentLastName = $Dependent->last_name;
        //     $this->dependentSSN = $Dependent->ssn;
        //     $this->dependentSSNDate = $Dependent->ssn_date;
        //     $this->dependentdod = $Dependent->birth_date;
        //     $this->dependentTaxpayerRelationship =$Dependent->relationship;
        //     $this->IsChildNaturalised = $Dependent->naturalized;
        // }

        $contact = Contact::where('user_id', UserID())->first();
        if($contact){
            $this->StreetAddress = $contact->street_address;
            $this->City = $contact->city;
            $this->Country = $contact->country;
            $this->ZIPCode = $contact->zipcode;
            $this->TaxPayerPhone =$contact->phone;
            $this->TaxpayerEmail = $contact->email;
        }

        $BankInfo = BankInformation::where('user_id', UserID())->first();
        if($BankInfo){
            $this->accountType = $BankInfo->account_type;
            $this->accountPhone = $BankInfo->account_number;
            $this->routingNo = $BankInfo->routing_number;
        }
    } //End Component mount

    public function IsUSACitizen($status){
    	$this->usCitizen = ($status == 'yes') ? 'yes':'no';
    }

    public function setClientCitizenship($value){
       
        $this->AreYouUSCitizen = ($value == 'yes') ? 'yes':'no';
    }

    // public function TryAreYouUSCitizen($status)
    // {
    //     $this->AreYouUSCitizen = ($status == 'yes') ? 'yes':'no';
    // }

    public function spouseCitizenship($status){
    	$this->isSpouseUSCitizen = ($status == 'yes') ? 'yes':'no';
    }

    public function backTo($step){
        $this->currentStep = $step;
    }

    public function back(){

    	$this->currentStep --;
    	$progress = \Session::get('progress') - 2;
    	\Session::put('progress',$progress);
        $this->emit('IncreamentProgress');
    }



    public function submitPersonalInfo($step=null){
       
        
    	$this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'TaxpayerDOB'=>'required',
            'occupation'=>'required',
            'AreYouUSCitizen'=>'required',
            // 'FilingType' =>'required',
            // 'SSN'=>'required_if:AreYouUSCitizen,==,yes',

        ]);

        $user = ModelsPersonalInformation::where('user_id', UserID())->first();
       
       
        if($user){
            $user->first_name  = $this->firstName;
            $user->last_name   = $this->lastName;
            $user->middle_name = $this->middleName;
            $user->birth_date  = $this->TaxpayerDOB;
            $user->occupation  = $this->occupation;
            $user->us_citizen  = $this->AreYouUSCitizen;
            $user->ssn         = $this->SSN;
            $user->countries_of_citizen = $this->CountrieOfCitizenship;
           
            if(!empty($this->SSNFile) && $this->SSN != null){
                   //$fileName = time().'-'.rand();
                // $fileURL = cloudinary()->upload($this->SSNFile->getRealPath())->getSecurePath();
                  //$result = $this->SSNFile->storeOnCloudinaryAs('expattaxcpa', $fileName);
                  
                   //$user->ss_card = $result->getSecurePath();
                
            }
            $user->save();
            $this->emit('personalInfoStore');

           
            return $this->currentStep = $step;
            // if($this->AreYouUSCitizen === 'yes' && $thhis->FilingType === 'MarriedJoint' 
            //     || $this->AreYouUSCitizen === 'yes' && $thhis->FilingType === 'MarriedSeparate')
            // {
            //     return $this->currentStep = 3;
            // }elseif($this->AreYouUSCitizen === 'yes' && $this->FilingType === 'Single'){
            //     return $this->currentStep = 6;
            // }elseif($AreYouUSCitizen === 'no' && $FilingType === 'MarriedJoint' || $AreYouUSCitizen === 'no' && $FilingType === 'MarriedSeparate' 
            //     || $AreYouUSCitizen === 'no' && $FilingType === 'Single')
            // {
            //     return $this->currentStep = 2;
            // }
            
        }

        $info              = new ModelsPersonalInformation;
        $info->user_id     = UserID();
        $info->first_name  = $this->firstName;
        $info->last_name   = $this->lastName;
        $info->middle_name = $this->middleName;
        $info->birth_date  = $this->TaxpayerDOB;
        $info->occupation  = $this->occupation;
        $info->us_citizen  = $this->AreYouUSCitizen;
        $info->ssn         = $this->SSN;
        $info->filing_type = $this->FilingType;
        $info->qualifying_dependens = $this->QualifingDependent;
        $info->countries_of_citizen = $this->CountrieOfCitizenship;

        
        if(!empty($this->SSNFile) ){
            //$fileName = time().'-'.rand();
            //$result = $this->SSNFile->storeOnCloudinaryAs('expattaxcpa', $fileName);
            //$user->ss_card = $result->getSecurePath();
            
        }

        $info->save();

        $data = ['firstName'=>$this->firstName,'lastName'=>$this->lastName,'middleName'=>$this->middleName,'TaxpayerDOB'=>$this->TaxpayerDOB,'occupation'=>$this->occupation,'TaxpayerCitizenShipStatus'=>$this->TaxpayerCitizenShipStatus,'SSN'=>$this->SSN,'SSNFile'=>$this->SSNFile, 'AreYouUSCitizen'=>$this->AreYouUSCitizen];
        Session::put('personal-info',$data);


 		// $this->currentStep ++;

        $this->progressUpdate();
        $this->emit('IncreamentProgress');
        $this->emit('personalInfoStore');
        return $this->currentStep = $step;
        
    }


    public function updatedSSNFile(){

        try{
            $info  = ModelsPersonalInformation::where('user_id',UserID())->first();

            if($info->user_id == UserID()){
                $fileName = time().'-'.rand();
                $result = $this->SSNFile->storeOnCloudinaryAs('expattaxcpa', $fileName);
                $info->ss_card = $result->getSecurePath();
                $info->save();
                $this->uploadedSSNCard = $result->getSecurePath();
              
            }else{
                $info = new ModelsPersonalInformation;
                $info->user_id     = UserID();
                $fileName = time().'-'.rand();
                $result = $this->SSNFile->storeOnCloudinaryAs('expattaxcpa', $fileName);
                $info->ss_card = $result->getSecurePath();
                $info->save();
                $this->uploadedSSNCard = $result->getSecurePath();
            }
            
            $this->emit('fileUploadedSuccessfully');

        
        }catch(\Exception $e){
            $this->emit('unableToUploadFile');
        }
        
        
       
    }


    

    public function submitSpuseInfo($switch=null){
        // if($this->AreYouUSCitizen == 'yes'){
    	//     $this->currentStep++;
        //     return $this->submitPersonalInfo();
        // }

        $validatedData = $this->validate([
            'SpouseFirstName' => 'required',
            'SpouseLastName' => 'required',
            'spouseDOB'=>'required',
            'isSpouseUSCitizen'=>'required',
            'spouseSSN'=>'required_if:isSpouseUSCitizen,===,yes',

        ],
        []);


        $user = SpousePersonals::where('user_id', UserID())->first();
        if($user){
            $user->user_id = UserID();
            $user->first_name = $this->SpouseFirstName;
            $user->last_name = $this->SpouseLastName;
            $user->middle_name = $this->SpouseMiddleName;
            $user->birth_date = $this->spouseDOB;
            $user->occupation = $this->SpouseOccupation;
            $user->us_citizen = $this->isSpouseUSCitizen;
            $user->ssn = $this->spouseSSN;
            if(!empty($this->SpouseSSNCardUpload)){
                //$user->ss_card = $this->SpouseSSNCardUpload->store('files');
                $fileName = time().'-'.rand().'sssn'; 
                $user->ss_card = $this->SpouseSSNCardUpload->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
            }

            $user->save();
            return $this->currentStep = $switch;
        }

        $info = new SpousePersonals;
        $info->user_id = UserID();
        $info->first_name = $this->SpouseFirstName;
        $info->last_name = $this->SpouseLastName;
        $info->middle_name = $this->SpouseMiddleName;
        $info->birth_date = $this->spouseDOB;
        $info->occupation = $this->SpouseOccupation;
        $info->us_citizen = $this->isSpouseUSCitizen;
        $info->ssn = $this->spouseSSN;
        if(!empty($this->SpouseSSNCardUpload)){
            //$info->ss_card = $this->SpouseSSNCardUpload->store('files');
            $fileName = time().'-'.rand().'sssncd'; 
            $info->ss_card = $this->SpouseSSNCardUpload->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
        }

        $info->save();

        $data = ['SpouseFirstName'=>$this->SpouseFirstName,'SpouseMiddleName'=>$this->SpouseMiddleName,'SpouseLastName'=>$this->SpouseLastName,'spouseDOB'=>$this->spouseDOB,'DoesSpouseHaveITN'=>$this->DoesSpouseHaveITN,'SpouseOccupation'=>$this->SpouseOccupation, 'isSpouseUSCitizen'=>$this->isSpouseUSCitizen, 'SpouseSSNCardUpload'=>$this->SpouseSSNCardUpload,'spouseSSN'=>$this->spouseSSN];
        Session::put('spouse-info',$data);

    	$this->currentStep = $switch;
    	$this->progressUpdate();
    	$this->emit('IncreamentProgress');
    }



    public function moveToDependent(){
        //Submit spouse info and move to dependent
        $validatedData = $this->validate([
            'DoesSpouseHaveITN' => 'required',
            // 'SpouseFID'=>'required_if:UploadSpouseForiegnId,===,true',
            // 'SpouseBC'=>'required_if:UploadSpouseBirthCert,===,true',
            // 'SpouseDL'=>'required_if:UploadSpouseForiegnId,===,true',
        ],
        []);

        $user = SpouseItin::where('user_id', UserID())->first();
        if($user){
            $user->itin = $this->DoesSpouseHaveITN;
            $user->itin_number = $this->SpouseITIN;
            $user->apply_itin = $this->SpouseWantToApplyForITIN;

            if(!empty($this->SpousePassport)){
                //$user->passport = $this->SpousePassport->store('files');
                $fileName = time().'-'.rand().'sssncd'; 
                $user->passport = $this->SpousePassport->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
            }

            if(!empty($this->SpouseDL)){
                //$user->driver_license = $this->SpouseDL->store('files');
                $fileName = time().'-'.rand().'sdl'; 
                $user->driver_license = $this->SpouseDL->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
            }
            if(!empty($this->SpouseBC)){
                //$user->birth_cert = $this->SpouseBC->store('files');
                $fileName = time().'-'.rand().'sbc'; 
                $user->birth_cert = $this->SpouseBC->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
            }

            if(!empty($this->SpouseFID)){
                //$user->foreign_id = $this->SpouseFID->store('files');
                $fileName = time().'-'.rand().'fid'; 
                $user->foreign_id = $this->SpouseFID->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
            }
            $user->non_resident_tax = $this->NonResidentSpouse;
            $user->save();
    	    return $this->currentStep++;
        }

        $info = new SpouseItin;
        $info->user_id = UserID();
        $info->itin = $this->DoesSpouseHaveITN;
        $info->itin_number = $this->SpouseITIN;
        $info->apply_itin = $this->SpouseWantToApplyForITIN;

        if(!empty($this->SpousePassport)){
            //$info->passport = $this->SpousePassport->store('files');
            $fileName = time().'-'.rand().'spas'; 
            $info->passport = $this->SpousePassport->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
        }

        if(!empty($this->SpouseDL)){
            //$info->driver_license = $this->SpouseDL->store('files');
            $fileName = time().'-'.rand().'sdl'; 
            $info->driver_license = $this->SpouseDL->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
        }
        if(!empty($this->SpouseBC)){
            //$info->birth_cert = $this->SpouseBC->store('files');
            $fileName = time().'-'.rand().'sbc'; 
            $info->birth_cert = $this->SpouseBC->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
        }

        if(!empty($this->SpouseFID)){
            //$info->foreign_id = $this->SpouseFID->store('files');
            $fileName = time().'-'.rand().'sfid'; 
            $info->foreign_id = $this->SpouseFID->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            
        }

        $info->non_resident_tax = $this->NonResidentSpouse;


        $info->save();

    	$this->currentStep ++;


        $data = ['DoesSpouseHaveITN'=>$this->DoesSpouseHaveITN, 'SpouseITIN'=>$this->SpouseITIN, 'SpouseWantToApplyForITIN'=>$this->SpouseWantToApplyForITIN, 'SpousePassport'=>$this->SpousePassport, 'UploadSpouseDL'=>$this->UploadSpouseDL,'UploadSpouseBirthCert'=>$this->UploadSpouseBirthCert,'UploadSpouseForiegnId'=>$this->UploadSpouseForiegnId,'SpouseDL'=>$this->SpouseDL,'SpouseBC'=>$this->SpouseBC,'SpouseFID'=>$this->SpouseFID,'NonResidentSpouse'=>$this->NonResidentSpouse];
        Session::put('spouse-ITIN',$data);
    	//Check if form is not empty
    	$this->progressUpdate();
    	$this->emit('IncreamentProgress');
    	//return redirect()->to('/id-verification');

    }




    public function submitDependentInfo(){

        $this->addNewDependent();
        // $user = Dependent::where('user_id', UserID())->first();
        // if($user){
    	   //  $user->first_name = $this->dependentFirstName;
        //     $user->last_name = $this->dependentLastName;
        //     $user->middle_name = $this->dependentMiddleName;
        //     $user->birth_date = $this->dependentdod;
        //     $user->relationship = $this->dependentTaxpayerRelationship;
        //     $user->naturalized = $this->IsChildNaturalised;
        //     $user->ssn = $this->dependentSSN;
        //     $user->ssn_date = $this->dependentSSNDate;
        //     $user->save();
             
        // }

        // $this->emit('dependant-added');
        // $info = new Dependent;
        // $info->user_id = UserID();
        // $info->first_name = $this->dependentFirstName;
        // $info->last_name = $this->dependentLastName;
        // $info->middle_name = $this->dependentMiddleName;
        // $info->birth_date = $this->dependentdod;
        // $info->relationship = $this->dependentTaxpayerRelationship;
        // $info->naturalized = $this->IsChildNaturalised;
        // $info->ssn = $this->dependentSSN;
        // $info->ssn_date = $this->dependentSSNDate;


        // $info->save();


        

        $data = ['dependentFirstName'=>$this->dependentFirstName, 'dependentMiddleName'=>$this->dependentMiddleName, 'dependentLastName'=>$this->dependentLastName, 'dependentSSN'=>$this->dependentSSN, 'dependentSSNDate'=>$this->dependentSSNDate,'dependentdod'=>$this->dependentdod,'dependentTaxpayerRelationship'=>$this->dependentTaxpayerRelationship,'IsChildNaturalised'=>$this->IsChildNaturalised];
        Session::put('dependent-info',$data);
         $this->currentStep ++;

         //$this->emit('dependant-added');

        
    }

    public function viewDependentData($id){
        $Dependent = Dependent::where('id',$id)->where('user_id', UserID())->first();

         if($Dependent){
            $this->dependentId = $Dependent->id;
            $this->dependentFirstName = $Dependent->first_name;
            $this->dependentMiddleName = $Dependent->middle_name;
            $this->dependentLastName = $Dependent->last_name;
            $this->dependentSSN = $Dependent->ssn;
            $this->dependentSSNDate = $Dependent->ssn_date;
            $this->dependentdod = $Dependent->birth_date;
            $this->dependentTaxpayerRelationship =$Dependent->relationship;
            $this->IsChildNaturalised = $Dependent->naturalized;
        }
       
    }

    public function addNewDependent(){
        try{
            $user = Dependent::where('id',$this->dependentId)->where('user_id', UserID())->first();
            if($user){
            $user->first_name = $this->dependentFirstName;
            $user->last_name = $this->dependentLastName;
            $user->middle_name = $this->dependentMiddleName;
            $user->birth_date = $this->dependentdod;
            $user->relationship = $this->dependentTaxpayerRelationship;
            $user->naturalized = $this->IsChildNaturalised;
            $user->ssn = $this->dependentSSN;
            $user->ssn_date = $this->dependentSSNDate;
            $user->save();  

            $this->clearDependentForm();
        }else{
           
            $info = new Dependent;
            $info->user_id = UserID();
            $info->first_name = $this->dependentFirstName;
            $info->last_name = $this->dependentLastName;
            $info->middle_name = $this->dependentMiddleName;
            $info->birth_date = $this->dependentdod;
            $info->relationship = $this->dependentTaxpayerRelationship;
            $info->naturalized = $this->IsChildNaturalised;
            $info->ssn = $this->dependentSSN;
            $info->ssn_date = $this->dependentSSNDate;
            $info->save(); 

            $this->clearDependentForm();
        }
        $this->emit('recordAdded');
        }catch(\Exception $e){
         $this->emit('error');
        }
         

    }



    public function clearDependentForm(){
       $this->dependentFirstName ="";
        $this->dependentLastName ="";
        $this->dependentMiddleName ="";
        $this->dependentdod ="";
        $this->dependentTaxpayerRelationship ="";
        $this->IsChildNaturalised ="";
        $this->dependentSSN ="";
        $this->dependentSSNDate =""; 
    }

    public function nextStep(){
        $this->emit('close-modal');
        $this->currentStep ++;
        $this->progressUpdate();
        $this->emit('IncreamentProgress');
        
    }


    public function submitITIN(){
        
        //if($this->AreYouUSCitizen == 'yes' && $this->SSN != null){
            // $this->validate([
            //     'SSN'=>'required_if:AreYouUSCitizen,===,yes',
            //     'SSNFile'=>'required'
            // ]);
            // $this->currentStep++;
            // return $this->submitPersonalInfo();
        // }else{
        //    return null;
        // }
        $validatedData = $this->validate([
            'TaxpayerForiegnPassportUpload'=>'required_if:WantToApplyForITINTaxpayer,===,yes',
            'dl'=>'required_if:UploadTaxpayerDL,===,true',
            'fId'=>'required_if:UploadTaxpayerDL,===,true',
            'bc'=>'required_if:UploadTaxpayerDL,===,true'
        ],
        []);


        $user = ItinInformation::where('user_id', UserID())->first();
        if($user){
            $user->itin = $this->DoYouHaveITIN;
            $user->itin_number = $this->TaxpayerITIN;
            $user->apply_itin = $this->WantToApplyForITINTaxpayer;
            $user->passport = $this->TaxpayerForiegnPassportUpload;
            
            if(!empty($this->TaxpayerForiegnPassportUpload)){
              
                $fileName = time().'-'.rand();
                $user->passport  = $this->TaxpayerForiegnPassportUpload->storeOnCloudinaryAs('expattaxcpa',$fileName)->getSecurePath();
              
            }
            
            if(!empty($this->dl)){
                //$user->driver_license = $this->dl->store('files');
                $fileName = time().'-'.rand();; 
                $user->driver_license = $this->dl->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
               
            }
            if(!empty($this->bc)){
                //$user->birth_cert = $this->bc->store('files');
                $fileName = time().'-'.rand();; 
                $user->birth_cert = $this->bc->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            }

            if(!empty($this->fId)){
                //$user->foreign_id = $this->fId->store('files');
                $fileName = time().'-'.rand();; 
                $user->foreign_id = $this->fId->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            }

            $user->non_resident_tax = $this->AreYouFilingNonResidentTax;

            
            $user->save();

    	    return $this->currentStep =3;
        }

        $info = new ItinInformation;
        $info->user_id = UserID();
        $info->itin = $this->DoYouHaveITIN;
        $info->itin_number = $this->TaxpayerITIN;
        $info->apply_itin = $this->WantToApplyForITINTaxpayer;
        $info->passport = $this->TaxpayerForiegnPassportUpload;
        
        if(!empty($this->TaxpayerForiegnPassportUpload)){
           
            //$info->passport = $this->TaxpayerForiegnPassportUpload->store('files');
            $fileName = time().'-'.rand();; 
            $info->passport = $this->TaxpayerForiegnPassportUpload->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
       
        }

        if(!empty($this->dl)){
           // $info->driver_license = $this->dl->store('files');
            $fileName = time().'-'.rand().'dl';
            $info->driver_license = $this->dl->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
       
        }
        if(!empty($this->bc)){
           // $info->birth_cert = $this->bc->store('files');
            $fileName = time().'-'.rand().'bc';
            $info->birth_cert = $this->bc->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
       
        }

        if(!empty($this->fId)){
            //$info->foreign_id = $this->fId->store('files');
            $fileName = time().'-'.rand().'fId';
            $info->foreign_id = $this->fId->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
       
        }

        $info->non_resident_tax = $this->AreYouFilingNonResidentTax;


        $info->save();


        $data = ['DoYouHaveITIN'=>$this->DoYouHaveITIN, 'WantToApplyForITINTaxpayer'=>$this->WantToApplyForITINTaxpayer, 'TaxpayerITIN'=>$this->TaxpayerITIN, 'TaxpayerForiegnPassportUpload'=>$this->TaxpayerForiegnPassportUpload, 'UploadTaxpayerDL'=>$this->UploadTaxpayerDL,'UploadTaxpayeBirthCert'=>$this->UploadTaxpayeBirthCert,'UploadTaxpayerForiegnId'=>$this->UploadTaxpayerForiegnId,'dl'=>$this->dl,'fId'=>$this->fId,'bc'=>$this->bc];
        Session::put('ITIN-info',$data);

    	$this->currentStep =3;
    	$this->progressUpdate();
    	 $this->emit('IncreamentProgress');
    }

    public function updatedTaxpayerForiegnPassportUpload()
    {
        // $user = ItinInformation::where('user_id', UserID())->first();
        // if($user)
        // {
        //     $fileName = time().'-'.rand();
        //     $user->passport  = $this->TaxpayerForiegnPassportUpload->storeOnCloudinaryAs('expattaxcpa',$fileName)->getSecurePath();  
        //     $user->save();
        // }else{
        //      $user = new  ItinInformation;
        //      $info->user_id = UserID();
        //      $user->passport  = $this->TaxpayerForiegnPassportUpload->storeOnCloudinaryAs('expattaxcpa',$fileName)->getSecurePath();  
        //      $user->save();
        // }
    }

    public function submitContactInfo(){
        $validatedData = $this->validate([
            'TaxpayerEmail'=>'required',
            'TaxPayerPhone'=>'required',
            'ZIPCode'=>'required',
            'Country'=>'required',
            'City'=>'required',
            'StreetAddress'=>'required'
        ],
        []);

        $user = Contact::where('user_id', UserID())->first();
        if($user){
            $user->street_address = $this->StreetAddress;
            $user->city = $this->City;
            $user->country = $this->Country;
            $user->zipcode = $this->ZIPCode;
            $user->phone = $this->TaxPayerPhone;
            $user->email = $this->TaxpayerEmail;

            $user->save();
            return $this->currentStep++;
        }

        $info = new Contact;
        $info->user_id = UserID();
        $info->street_address = $this->StreetAddress;
        $info->city = $this->City;
        $info->country = $this->Country;
        $info->zipcode = $this->ZIPCode;
        $info->phone = $this->TaxPayerPhone;
        $info->email = $this->TaxpayerEmail;

        $info->save();



        $data = ['StreetAddress'=>$this->StreetAddress, 'City'=>$this->City, 'Country'=>$this->Country, 'ZIPCode'=>$this->ZIPCode, 'TaxPayerPhone'=>$this->TaxPayerPhone,'TaxpayerEmail'=>$this->TaxpayerEmail];
        Session::put('contact-info',$data);

    	$this->currentStep ++;
    	$this->progressUpdate();
    	 $this->emit('IncreamentProgress');
    }

    public function moveToIdVerification(){
        $user = BankInformation::where('user_id', UserID())->first();
        if($user){
            $user->account_type = $this->accountType;
            $user->account_number = $this->accountPhone;
            $user->routing_number = $this->routingNo;
            $user->save();

            return redirect()->to('/id-verification');
        }

        $info = new BankInformation;
        $info->user_id = UserID();
        $info->account_type = $this->accountType;
        $info->account_number = $this->accountPhone;
        $info->routing_number = $this->routingNo;

        $info->save();

        $data = ['accountType'=>$this->accountType, 'accountPhone'=>$this->accountPhone, 'routingNo'=>$this->routingNo];
        Session::put('bank-info',$data);

        $this->progressUpdate();
        $this->emit('IncreamentProgress');
        return redirect()->to('/id-verification');
    }


    public function addDependentToList(){
    	$dependentData = [
        ];
       
        array_push($this->dependentList, $cartData);
        \Session::put('cartItems',$this->cart);
    }



    public function progressUpdate(){
    	 $progress = \Session::get('progress') + 2;
    	 \Session::put('progress',$progress);
         $this->emit('IncreamentProgress');
    }




    public function enableUploadTaxpayerUploadTaxpayerDL(){

        $this->UploadTaxpayerDL = true;
    }

    public function enableUploadTaxpayerBirthCert(){
        $this->UploadTaxpayeBirthCert = true;
    }

    public function enableUploadTaxpayerForiegnId(){
        $this->UploadTaxpayerForiegnId = true;
    }


    public function moveToTab($id){

        $this->currentStep = $id;
    }


    public function deleteFile($type,$file=null){
       
        switch($type){
            case 'personal-info': 
                $user = ModelsPersonalInformation::where('user_id', UserID())->first();
                $this->uploadedSSNCard ='';
                $user->ss_card = '';
                $user->save();
                break;

            case 'passport':
              
               $itin = ItinInformation::where('user_id', UserID())->first();
               $this->uploadedPassport='';
               $itin->passport = '';
               $itin->save();
                break;
            
            case 'dl':
              
               $itin = ItinInformation::where('user_id', UserID())->first();
               $this->UploadedDL='';
               $itin->driver_license = '';
               $itin->save();
                break;  
            
            case 'bc':
                $itin = ItinInformation::where('user_id', UserID())->first();
                $this->UploadedBirthCert='';
                $itin->birth_cert = '';
                $itin->save();
                break;

            case 'fId':
                $itin = ItinInformation::where('user_id', UserID())->first();
                $this->UploadedForeignId='';
                $itin->foreign_id = '';
                $itin->save();
                break;

            case 'spouse-passport':
                $SpouseItin = SpouseItin::where('user_id', UserID())->first();
                $SpousePassport = '';
                $this->uploadedSpousePassport = '';
                $SpouseItin->passport = '';
                $SpouseItin->save();
                break;
            case 'spouse-dl':
                $SpouseItin = SpouseItin::where('user_id', UserID())->first();
                $this->UploadedSpouseDL = '';
                $SpouseItin->driver_license = '';
                $SpouseItin->save();
                break;  
                
            case 'spouse-bc':
                    $SpouseItin = SpouseItin::where('user_id', UserID())->first();
                    $UploadSpouseBirthCert = '';
                    $SpouseItin->birth_cert = '';
                    $SpouseItin->save();
                    break; 
                    
             case 'spouse-fid':
                    $SpouseItin = SpouseItin::where('user_id', UserID())->first();
                    $this->UploadSpouseBirthCert = '';
                    $SpouseItin->foreign_id = '';
                    $SpouseItin->save();
                    break;
                
        }

        $this->emit('fileDeleted');
       
    }

    public function setFilingType($type)
    {
        session()->put('setFilingType',$type);
    }

    public function setCountryOfResidence($value)
    {
        
    }

    public function updatedQualifingDependent(){
       session()->put('hasDependent',$this->QualifingDependent);
    }

}
