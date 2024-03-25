<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'number',
        'payer_account',
        'beneficiary',
        'beneficiary_account',
        'beneficiary_inn',
        'beneficiary_kpp',
        'beneficiary_country',
        'beneficiary_city',
        'beneficiary_street',
        'beneficiary_bank_code',
        'currency_operation_code',
        'budget_organization_code',
        'income_code',
        'region_code',
        'have_bank_intermediary',
        'payment_sum',
        'payment_purpose',
        'currency_agreement',
        'comment',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Counterparty::class, 'owner_id');
    }

    // Mutator for 'type'
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = Crypt::encryptString($value);
    }

    // Mutator for 'date'
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Crypt::encryptString($value);
    }

    // Mutator for 'number'
    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = Crypt::encryptString($value);
    }

    // Mutator for 'payer_account'
    public function setPayerAccountAttribute($value)
    {
        $this->attributes['payer_account'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary'
    public function setBeneficiaryAttribute($value)
    {
        $this->attributes['beneficiary'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_account'
    public function setBeneficiaryAccountAttribute($value)
    {
        $this->attributes['beneficiary_account'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_inn'
    public function setBeneficiaryInnAttribute($value)
    {
        $this->attributes['beneficiary_inn'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_kpp'
    public function setBeneficiaryKppAttribute($value)
    {
        $this->attributes['beneficiary_kpp'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_country'
    public function setBeneficiaryCountryAttribute($value)
    {
        $this->attributes['beneficiary_country'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_city'
    public function setBeneficiaryCityAttribute($value)
    {
        $this->attributes['beneficiary_city'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_street'
    public function setBeneficiaryStreetAttribute($value)
    {
        $this->attributes['beneficiary_street'] = Crypt::encryptString($value);
    }

    // Mutator for 'beneficiary_bank_code'
    public function setBeneficiaryBankCodeAttribute($value)
    {
        $this->attributes['beneficiary_bank_code'] = Crypt::encryptString($value);
    }

    // Mutator for 'currency_operation_code'
    public function setCurrencyOperationCodeAttribute($value)
    {
        $this->attributes['currency_operation_code'] = Crypt::encryptString($value);
    }

    // Mutator for 'budget_organization_code'
    public function setBudgetOrganizationCodeAttribute($value)
    {
        $this->attributes['budget_organization_code'] = Crypt::encryptString($value);
    }

    // Mutator for 'income_code'
    public function setIncomeCodeAttribute($value)
    {
        $this->attributes['income_code'] = Crypt::encryptString($value);
    }

    // Mutator for 'region_code'
    public function setRegionCodeAttribute($value)
    {
        $this->attributes['region_code'] = Crypt::encryptString($value);
    }

    // Mutator for 'have_bank_intermediary'
    public function setHaveBankIntermediaryAttribute($value)
    {
        $this->attributes['have_bank_intermediary'] = Crypt::encryptString($value);
    }

    // Mutator for 'payment_sum'
    public function setPaymentSumAttribute($value)
    {
        $this->attributes['payment_sum'] = Crypt::encryptString($value);
    }

    // Mutator for 'payment_purpose'
    public function setPaymentPurposeAttribute($value)
    {
        $this->attributes['payment_purpose'] = Crypt::encryptString($value);
    }

    // Mutator for 'currency_agreement'
    public function setCurrencyAgreementAttribute($value)
    {
        $this->attributes['currency_agreement'] = Crypt::encryptString($value);
    }

    // Mutator for 'comment'
    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = Crypt::encryptString($value);
    }

    // Accessor for 'type'
    public function getTypeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'date'
    public function getDateAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'number'
    public function getNumberAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'payer_account'
    public function getPayerAccountAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary'
    public function getBeneficiaryAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_account'
    public function getBeneficiaryAccountAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_inn'
    public function getBeneficiaryInnAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_kpp'
    public function getBeneficiaryKppAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_country'
    public function getBeneficiaryCountryAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_city'
    public function getBeneficiaryCityAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_street'
    public function getBeneficiaryStreetAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'beneficiary_bank_code'
    public function getBeneficiaryBankCodeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'currency_operation_code'
    public function getCurrencyOperationCodeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'budget_organization_code'
    public function getBudgetOrganizationCodeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'income_code'
    public function getIncomeCodeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'region_code'
    public function getRegionCodeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'have_bank_intermediary'
    public function getHaveBankIntermediaryAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'payment_sum'
    public function getPaymentSumAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'payment_purpose'
    public function getPaymentPurposeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'currency_agreement'
    public function getCurrencyAgreementAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Accessor for 'comment'
    public function getCommentAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }


}