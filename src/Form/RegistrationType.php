<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\ExpressionLanguage\Node\GetAttrNode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationType extends AbstractType
{
    /**
     * Function used to create additional field attributes
     *
     * @param $label
     * @param $placeholder
     * @param $options
     * 
     * @return array
     */
    private function getAttributes($label, $placeholder, $options = [])
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, $this->getAttributes("Prénom", "Votre prénom ..."))
            ->add('lastname', Texttype::class, $this->getAttributes("Nom", "Votre nom de famille ..."))
            ->add('email', EmailType::class, $this->getAttributes("Email", "Votre adresse email ..."))
            ->add('hash', PasswordType::class, $this->getAttributes("Mot de passe", "Choisissez un mot de passe fort !"))
            ->add('passwordConfirm', PasswordType::class, $this->getAttributes("Confirmation mot de passe", "Veuillez confirmer votre mot de passe !"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
