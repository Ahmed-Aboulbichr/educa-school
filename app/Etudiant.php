<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    public function doc_files()
    {
        return $this->hasMany(docFile::class);
    }
}


/*$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($apiClient);
// assign recipient to template role by setting name, email, and role name. Note that the
// template role name must match the placeholder role name saved in your account template.
$templateRole = new DocuSign\eSign\Model\TemplateRole();
$templateRole->setEmail("betty@example.com");
$templateRole->setName("Betty Wallace");
$templateRole->setRoleName("signer");

// instantiate a new envelope object and configure settings
$envelop_definition = new DocuSign\eSign\Model\EnvelopeDefinition();
$envelop_definition->setEmailSubject("[DocuSign PHP SDK] - Signature Request Sample");
$envelop_definition->setTemplateId("703bb5d4-xxxx-xxxx-xxxx-83b43b28c384");
$envelop_definition->setTemplateRoles(array($templateRole));

// set envelope status to "sent" to immediately send the signature request*/